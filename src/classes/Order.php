<?php 
class Order extends Database
{
    private int $orderID;

    // Create new order for user
    public function setOrder($userID)
    {
        $sql = "INSERT INTO user_order (user_id)
                VALUES (?)";
        $pdo = $this->openConn();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userID]);
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
}