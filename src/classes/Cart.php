<?php
    class Cart extends User {
        private int $cartID;

        // On register
        public function setCart(int $item_count, float $item_price) 
        {
            $sql = "INSERT INTO cart (item_count, total_price)
            VALUES (?, ?)";
            $pdo = $this->openConn();
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$item_count, $item_price]);
            
            // Set last inserted cartID
            $this->setCartID($pdo->lastInsertId());
        }

        // On sign-in
        public function getCart($userID) 
        {
            $sql = "SELECT item_count, total_price
                    FROM cart
                    INNER JOIN user
                    ON cart.cart_id = user.cart_id
                    WHERE user_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$userID]);

            $cart = $stmt->fetch();
            return $cart;
        }

        public function setCartID($cartID)
        {
            $this->cartID = $cartID;
        }

        public function getCartID(): int
        {
            return $this->cartID;
        }


        // Product functions

        public function selectCartID($userID): array
        {
            $sql = "SELECT user.cart_id 
                    FROM cart
                    INNER JOIN user
                    ON cart.cart_id = user.cart_id
                    WHERE user_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$userID]);

            $cartID = $stmt->fetch();
            return $cartID;
        }

        public function insertCartProduct($cartID, $productID)
        {
            $sql = "INSERT INTO cart_product(cart_id, product_id)
                    VALUES (?, ?)";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$cartID, $productID]);
        }
    }
?>