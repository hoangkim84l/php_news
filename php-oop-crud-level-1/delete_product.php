<?php
if($_POST){
    //include database and object files
    include_once __DIR__."\config\Connection.php";
    include_once __DIR__."\objects\product.php";
    include_once __DIR__."\objects\category.php";

    //get database connection
    $database = new Database();
    $db = $database->getConnection();

    //prepare product object
    $product = new Product($db);

    //set id to be delete
    $product->id  = $_POST['object_id'];
    if($product->delete()){
        echo "Object was deleted";
    }else{
        echo "Unable to be delete.";
    }
}
?>