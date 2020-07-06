<?php
//set page header
$page_title = "Read detail product";
include_once __DIR__."\layout-header.php";

//Get Id in URL
$id = isset($_GET['id']) ? $_GET['id'] : die("Not found ID product");

//include database and object files
include_once __DIR__."\config\Connection.php";
include_once __DIR__."\objects\product.php";
include_once __DIR__."\objects\category.php";

//get database connection 
$database = new Database();
$db = $database->getConnection();

//prepare object
$product = new Product($db);
$category = new Category($db);

//set id product to be read
$product->id = $id;

//read detail product
$product->readOne();
?>
    <div class="right-button-margin">
        <a href="index.php" class="btn btn-primary pull-right">
            <span class="glyphicon glyphicon-list"></span> List product
        </a>
    </div>
    <table class="table table-hover table-responsive table-bordered">
        <tr>
            <td> Name </td>
            <td><?php echo $product->name?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><?php echo $product->price?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><?php echo $product->description?></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
                <?php
                    $category->id = $product->category_id;
                    $category->readName();
                    echo $category->name;
                ?>
            </td>
        </tr>

    </table>
<?php
include_once __DIR__."\layout_footer.php";
?>