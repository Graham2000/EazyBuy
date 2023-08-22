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
            $sql = "SELECT cart.cart_id, item_count, total_price
                    FROM cart
                    INNER JOIN user
                    ON cart.cart_id = user.cart_id
                    WHERE user_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$userID]);

            $cart = $stmt->fetch();
            return $cart;
        }

        public function getCartContents($userID): array
        {
            $sql = "SELECT product_name, item_count, total_price, user.cart_id, product.product_id,
                           img_cover, price, item_count, quantity, cart_product_id
                    FROM product
                    INNER JOIN image 
                    ON product.img_id = image.img_id
                    INNER JOIN cart_product
                    ON product.product_id = cart_product.product_id
                    INNER JOIN cart 
                    ON cart_product.cart_id = cart.cart_id
                    INNER JOIN user 
                    ON cart.cart_id = user.cart_id
                    WHERE user_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$userID]);

            $contents = $stmt->fetchAll();
            return $contents;
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

        /*
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
        }*/

        public function insertCartProduct($cartID, $productID, $quantity)
        {
            $sql = "INSERT INTO cart_product(cart_id, product_id, quantity)
                    VALUES (?, ?, ?)";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$cartID, $productID, $quantity]);
        }

        public function updateCart($itemCount, $totalPrice, $cartID)
        {
            $sql = "UPDATE cart 
                    SET item_count = ?, total_price = ?
                    WHERE cart_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$itemCount, $totalPrice, $cartID]);
        }

        // Remove product from cart
        public function removeProduct($cartProductID)
        {
            $sql = "DELETE FROM cart_product 
                    WHERE cart_product_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$cartProductID]);
        }
    }
?>