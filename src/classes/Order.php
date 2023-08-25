<?php 
class Order extends Database
{
    private int $orderID;

    // Create new order for user
    public function setOrder($orderTotal, $payID, $userID)
    {
        $sql = "INSERT INTO user_order (order_total, pay_id, user_id)
                VALUES (?, ?, ?)";
        $pdo = $this->openConn();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$orderTotal, $payID, $userID]);
        $this->setOrderID($pdo->lastInsertId());
    }

    // Add product to user's order
    public function setProduct($productID, $quantity, $orderID)
    {
        $sql = "INSERT INTO order_product (product_id, quantity, user_order_id)
                VALUES (?, ?, ?)";
        $stmt = $this->openConn()->prepare($sql);
        $stmt->execute([$productID, $quantity, $orderID]);
    }

    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    public function getOrderID()
    {
        return $this->orderID;
    }

    public function getUserOrders($userID)
    {
        $sql = "SELECT user_order_id, order_total
                FROM user_order 
                WHERE user_id = ?
                ORDER BY user_order_id DESC";
        $pdo = $this->openConn();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userID]);
        $orders = $stmt->fetchAll();
        return $orders;
    }

    public function getOrderContents($orderID)
    {
        $sql = "SELECT product_name, price, quantity
                FROM order_product
                INNER JOIN product
                ON order_product.product_id = product.product_id
                WHERE user_order_id = ?";
        $pdo = $this->openConn();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$orderID]);
        $orders = $stmt->fetchAll();
        return $orders;
    }

    // get order products
    public function getOrderProducts($orderID)
    {
        $sql = "SELECT DISTINCT product_name, product.product_id
                FROM user_order
                INNER JOIN order_product 
                ON user_order.user_order_id = order_product.user_order_id
                INNER JOIN product 
                ON order_product.product_id = product.product_id
                WHERE user_order.user_order_id = ?";
        $pdo = $this->openConn();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$orderID]);
        $productNames = $stmt->fetchAll();
        return $productNames;
    }

    // Check to see if order has already been executed
    public function orderUnique($payID)
    {
        $sql = "SELECT pay_id 
                FROM user_order 
                WHERE pay_id = ?";
        $pdo = $this->openConn();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$payID]);
        $payID = $stmt->fetch();

        if ($payID && $payID['pay_id']) {
            return false;
        } else {
            return true;
        }
    }
}
