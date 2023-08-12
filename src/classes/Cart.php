<?php
    class Cart extends User {
        private int $cartID;

        public function setCart(int $item_count, float $item_price) 
        {
            $sql = "INSERT INTO cart (item_count, total_price)
            VALUES (?, ?)";
            $pdo = $this->openConn();
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$item_count, $item_price]);
            
            // Set cartID
            $this->setCartID($pdo->lastInsertId());
        }

        public function setCartID($cartID)
        {
            $this->cartID = $cartID;
        }

        public function getCartID(): int
        {
            return $this->cartID;
        }

        public function getCart($cartId): string
        {

        }
    }
?>