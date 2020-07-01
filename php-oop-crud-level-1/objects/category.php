<?php
class Category{
    //connect database
    private $conn;
    private $table_name = "categories";

    //obj properties
    public $id;
    public $name;

    /**
     * Description: construst connect database when run
     * Function: __construct
     * @author: Di
     * @params: $db
     * @return: none
     */
    public function __construct($db)
    {
        $this->conn = $db;
    }

    /**
     * Description: Query get list category
     * Function: read()
     * @author: Di
     * @params: none
     * @return: lists of categories
     */
    public function read(){
        //select all data order by name
        $query = "SELECT
                    id, name
                    FROM
                    ". $this->table_name ."
                    ORDER BY
                    name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    /**
     * Description: Used to read category name by its ID
     * Function: readName()
     * @author: Di
     * @params: none
     * @return: name of category
     */
    function readName(){
        $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
    }
}
?>