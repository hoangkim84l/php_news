<?php
//set page header
$page_title = "Read Products";
include_once __DIR__."\layout-header.php";

//include core.php holds pagging variables
include_once __DIR__."\config\core.php";

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

            $page_url = "index.php?";
            //count all products
            $total_rows = $product->countAll();
            
            //read template.php controls how the product list be renderd
            include_once __DIR__."\read_template.php";
        ?>
    
<?php
//include footer
include_once __DIR__."\layout_footer.php"
?>