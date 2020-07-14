<!-- search form -->
<form action="search.php" role="search">
    <div class="input-group col-md-3 pull-left margin-right-1em">
        <?php $search_value = isset($search_term) ? "value='{$seach_term}'" : "" ;?>
        <input type="text" class="form-control" placeholder="enter product name or description" name="s" id="srch-term" required <?php $search_value?>/>
        <div class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="slyphicon slyphicon-search"></i></button>
        </div>
    </div>
</form>
<!-- create product button -->
<div class="right-button-margin">
    <a href="create_product.php" class="btn btn-primary pull-right">
        <span class="glyphicon glyphicon-plus"> </span> Create Product
    </a>
</div>
<!-- display product if there are any -->
<?php 
if ($total_rows > 0) {
    ?>
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
                    <a delete-id="<?php echo $id;?>" class="btn btn-danger delete-object">
                        <span class="glyphicon glyphicon-remove"></span> Delete
                    </a>
                </td> 
            </tr>
        <?php } ?>
    </table>
<?php
//include paging here
include_once __DIR__."\paging.php";
}
else{
    echo "<div class='alert alert-danger'>No products found.</div>";
}
?>