<?php
class Product{
    //connection database and table name
    private $conn;
    private $table_name = "products";

    //objects properties
    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;
    public $timestamp;

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
     * Description: create product
     * Function: create()
     * @author: Di
     * @params: none
     * @return: Save information to database
     */
    function create(){
        //Query insert
        $query = "INSERT INTO 
                " . $this->table_name . "
                SET name=:name, price=:price, description=:description, category_id=:category_id, created=:created";
        $stmt = $this->conn->prepare($query);

        //post value from form create_product
        $this->name = htmlspecialchars(strip_tags($this->name)); 
        $this->price = htmlspecialchars(strip_tags($this->price)); 
        $this->description = htmlspecialchars(strip_tags($this->description)); 
        $this->category_id = htmlspecialchars(strip_tags($this->category_id)); 

        //get current time and set to timestamp
        $this->timestamp = date('Y-m-d H:i:s');

        //bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->timestamp);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>