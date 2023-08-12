<?php
    class User extends Database 
    {
        private string $firstName;
        private string $lastName;
        private string $password;
        private string $email;
        private int $cartID;
        
        /*
        function __construct(string $firstName, string $lastName, string $password, 
                             string $email, int $cartID) 
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->password = $password;
            $this->email = $email;
            $this->cartID = $cartID;
        }*/

        public function setUser($firstName, $lastName, $password, $email, $cartID) 
        {
            $sql = "";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$firstName, $lastName, $password, $email, $cartID]);
        }



        public function getUser(int $userId) 
        {
            $sql = "SELECT user_id, first_name, last_name FROM user WHERE user_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$userId]);
            $fNames = $stmt->fetchAll();

            foreach ($fNames as $fName) 
            {
                echo $fName['first_name'] . '<br>';
            }
        }

        public function setLastName(string $lastName) 
        {
            $this->lastName = $lastName;
        }

        public function getLastName(): string 
        {
            return $this->lastName;
        }

    }
?>