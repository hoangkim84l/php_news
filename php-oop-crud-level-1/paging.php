<ul class="pagination">
    <?php if($page > 1){ 
        echo "<li><a href='{$page_url}' title='Go to the first page'>";
            echo "First";
        echo "</a></li>";
     } else{
        echo "<li><a href='' title='Go to the first page'>";
        echo "First";
    echo "</a></li>";
     }
    //calculate total pages
    $total_pages = ceil($total_rows / $records_per_page);
    //range of link to show
    $range = 2;
    //display link to "range of pages" around "current page"
    $inital_num = $page - $range;
    $condition_limit_num = ($page + $range) + 1;
    for($d = $inital_num; $d < $condition_limit_num; $d++){
        //make sure $d is greater than 0
        if(($d > 0) && ($d <= $total_pages)){
            //current page
            if($d == $page){
                echo "<li class='active'><a href=\"#\">$d<span class=\"sr-only\">(current)</span></a></li>";
            }
            //not current page
            else{
                echo "<li><a href='{$page_url}page=$d'>$d</a></li>";
            }
        }
    }
    //button last page
    if($page < $total_pages){
        echo "<li><a href='" . $page_url ."page={$total_pages}' title='Last page is {$total_pages}'>";
            echo "Last";
        echo "</a></li>";
    }
    ?>
</ul>