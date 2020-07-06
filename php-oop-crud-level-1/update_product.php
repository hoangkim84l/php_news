<?php
// retrieve one product will be here
//set page header
$page_title = "Update Product";
include_once __DIR__."\layout-header.php";

//get ID in URL
$id = isset($_GET['id']) ? $_GET['id'] : die("Missing ID");

//include database and objects files
include_once __DIR__."\config\Connection.php";
include_once __DIR__."\objects\product.php";
include_once __DIR__."\objects\category.php";

//get connection
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$category = new Category($db);

//set ID properties of product to be edit
$product->id = $id;

//read detail product
$product->readOne();

//if form submited
if($_POST){
    //set product property
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->description = $_POST['description'];
    $product->category_id = $_POST['category_id'];
    //update product
    if($product->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated";
        echo "</div>";
    }else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update product";
        echo "</div>";
    }
}
?>
<div class="right-button-margin">
    <a href="index.php" class="btn btn-default pull-right">List Product</a>
</div>

<!-- form update recode -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}")?>" method="post">
    <table class="table table-hover table-responsive table-bordered">
        <tr>
            <td> Name </td>
            <td> <input type="text" name="name" class="form-control" value="<?php echo $product->name?>"> </td>
        </tr>
        <tr>
            <td> Price </td>
            <td> <input type="text" name="price" value="<?php echo $product->price?>" class="form-control"></td>
        </tr>
        <tr>
            <td> Description </td>
            <td>
                <textarea name="description" class="form-control" id=""><?php echo $product->description?></textarea>
            </td>
        </tr>
        <tr>
            <td> Category</td>
            <td>
                <?php
                    $stmt = $category->read();
                    echo "<select class='form-control' name='category_id'>";
                    echo "<option>Choose category</option>";
                        while($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){  
                            $category_id = $row_category['id'];
                            $category_name = $row_category['name'];
                            //curent seclect
                            if($product->category_id == $category_id){
                                echo "<option value='$category_id' selected>";
                            }else{
                                echo "<option value='$category_id'>";
                            }
                            echo "$category_name</option>";
                        }
                    echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
    </table>
</form>
<?php
//include footer
include_once __DIR__."\layout_footer.php";
?>