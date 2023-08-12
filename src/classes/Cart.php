<?php
    class Cart extends User {
        private int $item_count;
        private float $total_price;

        /*
        function __construct(int $item_count, float $total_price) 
        {
            $this->item_count = $item_count;
            $this->total_price = $total_price;
        }
        */

        public function setCart(int $item_count, float $item_price) 
        {
            $sql = "INSERT INTO cart (item_count, total_price)
            VALUES (?, ?)";
            $pdo = $this->openConn();
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$item_count, $item_price]);

            $lastInsertID = $pdo->lastInsertId();
            return $lastInsertID;
        }

        // Get last generated id on register -- move to DB getLastInsertID(){}
        public function getGeneratedCartID()
        {
            $sql = "SELECT LAST_INSERT_ID() AS last_id";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute();
            $cartID = $stmt->fetchAll();

            return $cartID;
        }

        public function getCart($cartId): string
        {

        }
    }
?>