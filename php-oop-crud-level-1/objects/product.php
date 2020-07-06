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

    /**
     * Description: Get all data and limit by condition
     * Function: readAll()
     * @author: Di
     * @params: $from_record_num, $records_per_page
     * @return: Lists of product
     */
    function readAll($from_record_num, $records_per_page){
        $query = "SELECT 
                    id, name, description, price, category_id
                  FROM 
                  " . $this->table_name. "
                  LIMIT
                  {$from_record_num}, {$records_per_page}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

     /**
     * Description: Get one product by ID
     * Function: readOne()
     * @author: Di
     * @params: none
     * @return: Detail of product
     */
    function readOne(){
        $query = "SELECT 
                    name, price, description, category_id
                FROM
                    " . $this->table_name . "
                WHERE 
                    id = ?
                LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->price = $row['price'];
        $this->category_id = $row['category_id'];
    }

    /**
     * Description: Used for paging products
     * Function: countAll()
     * @author: Di
     * @params: None
     * @return: total products
     */
    function countAll(){
        $query = "SELECT id FROM " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();
        return $num;
    }

    /**
     * Description: update product by id
     * Function: update()
     * @author: Di
     * @params: None
     * @return: update information record
     */
    function update(){
        $query = "UPDATE
                    " . $this->table_name . "
                    SET
                        name = :name,
                        price = :price,
                        description = :description,
                        category_id = :category_id
                    WHERE
                        id = :id"; 
        $stmt = $this->conn->prepare($query);
        //posted values
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind parameter
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        //execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    /**
     * Description: Delete the product
     * Function: delete()
     * @author: Di
     * @params: id product
     * @return: execute a record
     */
    function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>