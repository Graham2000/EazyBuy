<?php    
    class Database {
        private string $servername;
        private string $username;
        private string $password;
        private string $dbname;
        
        function __construct(string $servername, string $username, string $password, string $dbname) {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
        }
        
        public function openConn() {
            // Create connection
            $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }

        function selectUser($userId) {
            $sql = "SELECT user_id, first_name, last_name FROM user WHERE user_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$userId]);
            $fNames = $stmt->fetchAll();

            foreach ($fNames as $fName) {
                echo $fName['first_name'] . '<br>';
            }
        }

        function get_db() {
            return $this->dbname;
        }

        function printRows($rows) {
            foreach ($rows as $row) {
                echo "";
            }
        }
    }

    $db = new Database($_SERVER['SERVER_NAME'], $_SERVER['USERNAME'], $_SERVER['PASSWORD'], $_SERVER['DB_NAME']);
    $db->selectUser(14);
?>