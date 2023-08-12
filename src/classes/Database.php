<?php    
    require_once __DIR__ . "/../vendor/autoload.php";
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();

    class Database 
    {

        
        protected function openConn() 
        {
            // Create connection
            $dsn = 'mysql:host=' . $_ENV['SERVERNAME']. ';dbname=' . $_ENV['DBNAME'];
            $pdo = new PDO($dsn, $_ENV['USERNAME'], $_ENV['PASSWORD']);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }

        protected function getLastInsertID()
        {

        }
    }
?>