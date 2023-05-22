<!-- Create a connect to SQL Server -->

<?php
class Database {

    //Decluring Variable of Server
    private $host = "sql12.freesqldatabase.com";
    private $db_name = "sql12616274";
    private $username = "sql12616274";
    private $password = "pJsHj7f5Mt";


    public function connect() {
        $conn = null;
        try {
            $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $exception) {

            //Error Message
            echo "Connection error: " . $exception->getMessage();
        }
        return $conn;
    }
}
