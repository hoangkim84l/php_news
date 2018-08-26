<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
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
		text-decoration: none;
	}
    h3{
        margin: auto;
        font-size:15px;
    }
	#header {
      background-color: green;
      color: white;
      text-align: center;
    }

    #menu {
      width: 85%;
      height: 150px;
      background-color: #FFF;
      margin-left: 100px;

    }

    #left {
      width: 250px;
      height: 400px;
      background-color: #fff;
      float: left;
      margin-left: 100px;
      text-decoration: none;
    }

    #content {
      width: 100px;
      background-color: white;
      height: auto;
      float: left;
      margin-top: 70px;
    }

    #footer {
      width: 100%;
      height: 500px;
      background-color: #000;
      clear: both;
      color: #FFF;
    }
	.navbar {
      border-top: 2px solid #CCC;
      border-bottom: 2px solid #CCC;
    }
	.bdleft {
      border-bottom-style: dashed;
      border-bottom-width: 1px;
    }

    #hvleft {
      -webkit-transform: scale(1);
      -webkit-transition-timing-function: ease-out;
      -webkit-transition-duration: 500ms;
    }

    #hvleft :hover {
      -webkit-transform: scale(.5);
      -webkit-transition-timing-function: ease-out;
      -webkit-transition-duration: 500ms;
    }.container{width: 950px;}
</style>
<script>
	function sure()
	{
		if( confirm("Are you sure?"))
		{
		return true;
		}
		else{
			return false;
		}
			}
</script>	
</head>
<body>
<?php include("../../Include/connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="DELETE FROM news where id='$id'";
	mysqli_query($conn,$sql);	
}
?>
<?php 
	$sq="select * from news";
	$result=mysqli_query($conn,$sq);
?>
 <div id="header">
    Header
</div>
<div id="menu">
    <div style="float:left">
      <h1> INDEX PAGE NEWS</h1>
    </div>
    <br>
    <br>
    <div style="float:right">
      <form id="form1" name="form1" method="post" action="">
        <label for="timkiem"></label>
        <input name="timkiem" type="text" id="timkiem" placeholder="Tìm Kiếm" value="active" style="opacity:0.1;" />
        <input type="submit" name="Tim" id="Tim" value="Tìm" />
      </form>

    </div>
    <br>
    <br>
    <div class="navbar">
      <div class="bs-example">
        <div class="navbar-header">
          <div class="dropdown">
            <button class="btn btn-success btn-lg" type="button" data-toggle="dropdown">
              <span class="glyphicon glyphicon-th-list"></span> BUTTON</button>
            <ul class="dropdown-menu">
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 1
                </a>
              </li>
              <div class="bdleft"></div>
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 3
                </a>
              </li>
              <div class="bdleft"></div>
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 4
                </a>
              </li>
              <div class="bdleft"></div>
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 5
                </a>
              </li>
              <div class="bdleft"></div>
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 6
                </a>
              </li>
              <div class="bdleft"></div>
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 7
                </a>
              </li>
              <div class="bdleft"></div>
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 8
                </a>
              </li>
              <div class="bdleft"></div>
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 9
                </a>
              </li>
              <div class="bdleft"></div>
              <li>
                <a href="#" style="margin-left: 10px; color:#000">
                  <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; SẢN PHẨM 10
                </a>
              </li>
            </ul>
          </div>

        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#" style="color:green">Trang Chủ</a>
            </li>
            <li>
              <a href="#">Hình Ảnh</a>
            </li>
            <li>
              <a href="#">Liên Hệ</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <p>&nbsp;</p>

  <div id="left">
    <a href="#" style="margin-left: 20px; color:#000">
      <span class="glyphicon glyphicon-asterisk"></span>&nbsp; &nbsp; &nbsp; &nbsp; THÔNG TIN LIÊN HỆ
    </a>
    <br>
    <br>
    <div class="bdleft"></div>
    <br>
    <div style="border: 1px solid #3F0;max-height: 410px;margin:1px ;">
      <center>
        <h3 class="home_category_title">
        </h3>
      </center>
      <div class="home_category_image">
        <img class="img-responsive" src="tính.jpg" alt="" title="" height="50%" width="50%"
          style="display: block; margin-left: auto; margin-right: auto;">
      </div>
      <div id="hvleft">
        <div class="home_category_content">
          <span class="home_category_desc">
          </span>
          <br>
          <b>
            <a href="#" style="margin-left: 20px; color:#000">
              <span class="glyphicon glyphicon-user"></span>&nbsp; : &nbsp;Võ Văn Tính
            </a>
            <br/>
            <a href="#" style="margin-left: 20px; color:#000">
              <span class="glyphicon glyphicon-earphone"></span>&nbsp; : &nbsp;01694595117
            </a>
            <a href="#" style="margin-left: 20px; color:#000">
              vovantinhts@gmail.com
            </a>
          </b>
        </div>
      </div>
    </div>
  </div>
  <br>
  <hr style="width:600px;">
  <div id="content">
	  <div class="container" >
<div class="row" style="text-align: center; color: red;">
<h2><center>Danh Sách Bài Viết</center></h2></div>
<table width="300" border="1">
  <?php 
  	while($row=mysqli_fetch_array($result))
	{
  ?>
   <div class="col-md-4">
                <div style="border: 1px solid #8AB570;border-radius: 10px;max-height: 2000px;margin: 3px; width: 100%;">
                  <center><h3 class="home_category_title" style="overflow: none;text-overflow: ellipsis;height:30px;color:#000; font-size:15px;">
                    <div class="title" Style="color: red;">
                       <h4>
                            <i><?php echo $row['id']; ?></i>--<?php echo $row['title']; ?>
                        </h4>
    </div>
                    <div class="intro"><?php echo $row['intro']; ?></div>
                  </center>
                  <div class="home_category_image">
                    <center>
                        <img src="<?php echo $row['image_link'];?>" >
                   </center>
                  </div>
                  <br/><b>Ngày tạo (<?php echo date("m/d/Y", strtotime($row['created']))?>) </b> - Lượt xem 
                  (<b><?php echo $row['count_view']; ?></b>) 
                  -- <a href="index.php?id=<?php echo $row['id'];?>" onclick="return sure();">xóa</a>-- 
                  <a href="update.php?id=<?php echo $row['id'];?>">Update</a>
  	<br/>
		<center><a class="btn btn-2" href="xem_them.php">Xem Ngay</a></center><br/>
                </div>               
              </div>
	</div>  
              
  <?php
	}
  ?>
</table>
</div>
</div>
</div></div>
</div>
<div id="footer">
    <div class="col-sm-12">
      <div class="row">
        <div class="home_category_inner">
          <div class="col-sm-4">
            <div style="border: 0px solid #3F0;border-radius: 15px;max-height: 410px;margin: 1px;">
              <h3 class="home_category_title">
                <br>
                <span>INDEX PAGE NEWS</span>
              </h3>
			  <br> My name's Tinh. I'm nineteen years old. I'm from Tra Vinh province. I'm a student in Can Tho
			  University Software Center. 
              <div class="home_category_content">
                <span class="home_category_desc">
                </span>
                <br/>
                <br/>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div style="border: 0px solid #3F0;border-radius: 15px;margin: 1px;">
              <h3>&nbsp;&nbsp; THÔNG TIN LIÊN HỆ
              </h3>
              <div class="home_category_image">
                <a href="#" style="margin-left: 20px; color:#fff">
                  <span class="glyphicon glyphicon-home"></span>&nbsp; Trần Hưng Đạo street
                  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Ninh Kiều, Cần thơ
                </a>
                <br>
                <br>
                <a href="#" style="margin-left: 20px; color:#fff">
                  <span class="glyphicon glyphicon-home"></span>&nbsp; 219, ấp Phố, xã An Quảng Hữu
                  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; huyện Trà Cú, tỉnh Trà Vinh.
                </a>
                <br>
                <br>
                <a href="#" style="margin-left: 20px; color:#fff">
                  <span class="glyphicon glyphicon-earphone"></span>&nbsp; 01694595117
                </a>
                <br>
                <br>
                <a href="#" style="margin-left: 20px; color:#fff">
                  <span class="glyphicon glyphicon-envelope"></span>&nbsp; vovantinhts@gmail.com
                </a>
              </div>
              <br/>
              <br/>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div style="border: 0px solid #3F0;border-radius: 15px;">
            <h3>
              <span>FANPAGE(chưa có!)</span>
            </h3>

            <br/>
            <br>
          </div>
        </div>

      </div>
    </div>
    <hr style="color:#fff;">
  </div>
</body>
</html>