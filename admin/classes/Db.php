 <?php
 error_reporting(E_ALL);
 include_once "config.php";
class Db {
    private $dbHost = DBHOST; 
    private $dbUser = DBUSER;
    private $dbPassword= DBPASS;
    private $dbName = DBNAME;

    public function connect() {
        try {
            $connection = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}", $this->dbUser, $this->dbPassword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?> 
