<?php
    class User extends Database 
    {
        public function setUser($firstName, $lastName, $password, $email, $cartID) 
        {
            $sql = "INSERT INTO user (first_name, last_name, email, password, cart_id)
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$firstName, $lastName, $password, $email, $cartID]);
        }

        public function getPassword($email)
        {
            $sql = "SELECT user_id, password
                    FROM user
                    WHERE email = ?";

            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$email]);
            $password = $stmt->fetch();

            return $password;
        }
    }
?>