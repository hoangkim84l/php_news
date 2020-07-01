<?php
class Database{
    //Set database credentials
    private $host = "localhost";
    private $db_name = "php_data";
    private $username = "root";
    private $password = "";

    //get database connection
    public function getConnection(){
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=". $this->host .";dbname=".$this->db_name, $this->username, $this->password);
        } catch (PDOException $exc) {
            //throw $th;
            echo "Connection error : ".$exc->getMessage();
        }
        return $this->conn;
    }
}
?>