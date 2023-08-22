<?php 
class Order extends Database
{
    private int $orderID;

    // Create new order for user
    public function setOrder($orderTotal, $userID)
    {
        $sql = "INSERT INTO user_order (order_total, user_id)
                VALUES (?, ?)";
        $pdo = $this->openConn();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$orderTotal, $userID]);
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
                WHERE user_id = ?";
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
}
