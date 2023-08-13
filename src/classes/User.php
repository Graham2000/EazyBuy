<?php
    class User extends Database 
    {
        private int $userID;

        public function setUser($firstName, $lastName, $password, $email, $cartID) 
        {
            $sql = "INSERT INTO user (first_name, last_name, email, password, cart_id)
                    VALUES (?, ?, ?, ?, ?)";
            $pdo = $this->openConn();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$firstName, $lastName, $password, $email, $cartID]);
            $this->setUserID($pdo->lastInsertId());
        }

        public function getPassword($email)
        {
            $sql = "SELECT user_id, first_name, password
                    FROM user
                    WHERE email = ?";

            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$email]);
            $password = $stmt->fetch();

            return $password;
        }

        public function emailUnique($email): bool
        {
            $sql = "SELECT email
                    FROM user
                    WHERE email = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$email]);
            $email = $stmt->fetch();

            if ($email) return false;

            return true;
        }

        public function setUserID($userID)
        {
            $this->userID = $userID;
        }

        public function getUserID()
        {
            return $this->userID;
        }
    }
?>