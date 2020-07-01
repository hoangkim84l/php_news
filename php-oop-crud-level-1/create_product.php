<?php
//include database and Object files
include_once __DIR__.'\config\Connection.php';
include_once __DIR__.'\objects\product.php';
include_once __DIR__.'\objects\category.php';

//get database connection
$database = new Database();
$db = $database->getConnection();

//parse connection to objects
$product = new Product($db);
$category = new Category($db);

//set page header and include layout
$page_title = 'Create Product';
include_once __DIR__.'\layout-header.php';

//content
//if form submit
if($_POST){
    //set property value
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->description = $_POST['description'];
    $product->category_id = $_POST['category_id'];

    // create the product
    if($product->create()){
        echo "<div class='alert alert-success'>Product was created.</div>";
    }
  
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
 }
?>
    <div class="right-button-margin">
        <a href="index.php" class="btn btn-default pull-right"> Read Products</a>
    </div>
    <!-- HTML form for creating a product -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <td>Name </td>
                <td> <input type="text" name="name" class="form-control"></td>
            </tr>

            <tr>
                <td>Price </td>
                <td> <input type="text" name="price" class="form-control"></td>
            </tr>

            <tr>
                <td>Description </td>
                <td> <textarea name="description" id="" class="form-control"></textarea></td>
            </tr>

            <tr>
                <td>Category</td>
                <td>
                    <!-- categories from database -->
                    <?php 
                        $stmt = $category->read();
                        ?>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Select category ...</option>
                            <?php
                                while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    extract($rows);
                                    echo "<option value='{$id}'>{$name}</option>";
                                }
                            ?>
                        </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary"> Create</button>
                </td>
            </tr>
        </table>
    </form>
<?php
//include footer
include_once __DIR__.'\layout_footer.php';
?>