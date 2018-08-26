<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INFORMATION</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
tr td p img {
		height:100px !important;
		width:100px;
		
	}
	.thumb{
		height:  100px !important;
	}
	tr td div span img {
		height: 100px !important;
	}

	a{
		border: 1px solid #EBF8A4;
		background-color: #4F5D95;
		color: #0397E6;
		width: 90px;
		text-decoration: none;
	}
    h3{
        margin: auto;
        font-size:15px;
    }
</style>
</head>
<body>
    <?php
    include("../../Include/connection.php");
    $sq="select * from news";
	$result=mysqli_query($conn,$sq);
    ?>
    <?php 
	$sq="select * from news";
	$result=mysqli_query($conn,$sq);
?>
<div class="container">
<div class="row" style="text-align: center; color: red;">
<div class="col-md-12"><h2>Danh Sách Bài Viết</h2></div>
</div>
<table width="694" border="1">
  <?php 
  	while($row=mysqli_fetch_array($result))
	{
  ?>
   <div class="col-sm-4">
                <div style="border: 1px solid #8AB570;border-radius: 10px;max-height: 2000px;margin: 3px;">
                  <center><h3 class="home_category_title" style="font-size: 25px;overflow: none;text-overflow: ellipsis;width:95%;height:30px;color:#000; font-size:15px;">
                    <div class="title" Style="color: red;">
                       <h4>
                            <i><?php echo $row['id']; ?></i>--<?php echo $row['title']; ?>
                        </h4>
    </div>
                    <div class="intro"><?php echo $row['intro']; ?></div>
                  </center>
                  <div class="home_category_image">
                    <center>
                        <img src="<?php echo $row['image_link'];?>" style="margin: 50px -178px 0 110px; ">
                   </center>
                  </div>
                  <div class="content">
                     <?php echo $row['content']; ?>
                    </div>
                  <br/><b>Ngày tạo (<?php echo date("m/d/Y", strtotime($row['created']))?>) </b> - Lượt xem 
                  (<b><?php echo $row['count_view']; ?></b>) 
  	<br/>
                </div>               
              </div>
              
              
  <?php
	}
  ?>
</body>
</html>