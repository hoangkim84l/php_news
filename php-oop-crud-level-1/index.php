<?php
//set page header

use Symfony\Component\Process\Process;

$page_title = "Read Products";
include_once __DIR__."\layout-header.php";

//include database and objects
include_once __DIR__."\config\Connection.php";
include_once __DIR__."\objects\product.php";
include_once __DIR__."\objects\category.php";

//instand database and object
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$category = new Category($db);

//setup paginate variables
$page = isset($_GET['page']) ? $_GET['page'] : 1;
//set number of records per page
$records_per_page = 10;
//calculate for query limir clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
//query product
$stmt = $product->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();
?>
    <div class="right-button-margin">
        <a href="create_product.php" class="btn btn-default pull-right"> Create Product</a>
    </div>
    <?php if($num > 0){ ?>
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <th> Product </th>
                <th> Price </th>
                <th> Description </th>
                <th> Category </th>
                <th> Actions </th>
            </tr>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  extract($row)?>
                <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $description ?></td>
                    <td>
                        <?php $category->id = $category_id;
                                $category->readName();
                                echo $category->name;
                        ?>
                    </td>
                    <td>
                        <a href="read_one.php?id=<?php echo $id;?>" class="btn btn-primary left-margin">
                            <span class="glyphicon glyphicon-list"></span>    View
                        </a>
                        <a href="update_product.php?id=<?php echo $id;?>" class="btn btn-info left-margin">
                            <span class="glyphicon glyphicon-edit"> </span> Update
                        </a>
                        <a dlete-id="<?php echo $id;?>" class="btn btn-danger delete-object">
                            <span class="glyphicon glyphicon-remove"></span> Delete
                        </a>
                    </td> 
                </tr>
            <?php } ?>
        </table>
        <!-- page where this paging is use -->
        <?php
            $page_url = "index.php?";
            //count all products
            $total_rows = $product->countAll();
            //include paging here
            include_once __DIR__."\paging.php"
        ?>
    <?php } 
        else{
            echo "<div class='alert alert-info'>No products found.</div>";
        }
    ?>
<?php
//include footer
include_once __DIR__."\layout_footer.php"
?>