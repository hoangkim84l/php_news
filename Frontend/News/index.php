<!DOCTYPE html>
<html>

<head>
  <title>index</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
  <link rel="stylesheet" href="style_css_icon_phone.css">
  <link rel="stylesheet" href="scroll_to_top.css">
  <link rel="stylesheet" href="index_css.css">
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
<script>
$(document).ready(function(){
$(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
        $('.scrollToTop').fadeIn();
    } else {
        $('.scrollToTop').fadeOut();
    }
});

$('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
});

});
</script>
</head>

<body>
  <?php 
  session_start();
  include("../../Include/connection.php");
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="DELETE FROM news where id='$id'";
  mysqli_query($conn,$sql);
}
?>
   <?php
   if (isset($_POST["btnthoat"])) {
     unset($_SESSION["username"]);
     echo '<meta http-equiv="REFRESH" content ="0;URL=../Login.php"/>';
   }
   ?>     
  <?php 
	$sq="select * from news";
	$result=mysqli_query($conn,$sq);
?>
  <div id="header">
  <div style="float: left; margin-left: 100px;">
    Header
    </div>
    <div style="float: right; margin-right: 100px;"> 
    <?php
      echo"Chào bạn ".$_SESSION["username"];
    ?>
    <form action="" id="" name="" method="post" style="margin:-24px 0 0 107px;">
    <input type="submit" value=" Thoát " name="btnthoat"></form>
    </div>
  </div>
  <div id="menu">
    <div style="float:left">
      <h1> INDEX PAGE NEWS</h1>
    </div>
    <br>
    <br>
    <div style="float:right;">
   
      <form id="form1" name="form1" method="post" action="">
        <label for="timkiem" ></label>
        <input name="timkiem" type="text" id="timkiem" placeholder="Tìm Kiếm" value="active" style="border: 1px solid white;" />
        <input type="submit" name="Tim" id="Tim" value="Tìm" />
      </form>
    </div>
    <br>
    <br>
    <div style="border: 1px solid #D9D9D9; margin-top: 30px;">
    <div id="navbarCollapse">
          <ul class="nav navbar-nav navbar-left">
          
            <li><div class="dropdown">
            <a href="#" class="btn btn-lg" style="border: 0px; border-radius: 0px; background-color: #8AB570; color: #fff;">
            <span class="glyphicon glyphicon-menu-hamburger"></span> 
            
            Danh Mục Sản Phẩm
            </a>
            <div class="dropdown-content">
              <a href="#" style="border-bottom: 1px dashed green;">
              <span class="glyphicon glyphicon-asterisk" ></span>
               Sản Phẩm 1
              </a>
              <a href="#" style="border-bottom: 1px dashed green;">
              <span class="glyphicon glyphicon-asterisk"></span>
              Sản Phẩm 2
              </a>
              <a href="#" style="border-bottom: 1px dashed green;">
              <span class="glyphicon glyphicon-asterisk"></span>
              Sản Phẩm 3
              </a>
  </div> </div>
            </li>
           
</ul> 
</div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#" style="color:green">Trang Chủ</a>
            </li>
            <li>
              <a href="#"  style="color:#3D3D3D;">Hình Ảnh</a>
            </li>
            <li>
              <a href="#"  style="color:#3D3D3D;">Liên Hệ</a>
            </li>
            <li>
              <a href="add.php">Thêm Sản Phẩm</a>

            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
  <p>&nbsp;</p>
  <div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon" style="right: 180px; bottom: 150px; position: fixed; z-index: 9999">
 <div class="phonering-alo-ph-circle"></div>
 <div class="phonering-alo-ph-circle-fill"></div>
 <a href="tel:+01694595117"></a>
 <div class="phonering-alo-ph-img-circle">
 <a href="tel:+01694595117"></a>
 <a href="tel:+01694595117" class="pps-btn-img " title="Liên hệ">
 <img src="https://i.imgur.com/v8TniL3.png" alt="Liên hệ" width="50" onmouseover="this.src='https://i.imgur.com/v8TniL3.png';" onmouseout="this.src='https://i.imgur.com/v8TniL3.png';">
 </a>
 </div>
</div>
<div id="left">
    <a href="#" style="margin-left: 20px; color:#000;  text-decoration: none;">
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
        <img class="img-responsive" src="tính.jpg" alt="" title="" height="50%" width="50%" style="display: block; margin-left: auto; margin-right: auto; padding-top: 10px;">
      </div>
      <div id="hvleft">
        <div class="home_category_content">
          <span class="home_category_desc">
          </span>
          <br>
          <b>
            <a href="#" style="margin-left: 45px; color:#000">
              <span class="glyphicon glyphicon-user"></span>&nbsp; : &nbsp;Võ Văn Tính
            </a>
            <br />
            <a href="#" style="margin-left: 45px; color:#000">
              <span class="glyphicon glyphicon-earphone"></span>&nbsp; : &nbsp;01694595117
            </a>
            <a href="#" style="margin-left: 45px; color:#000">
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
    <div class="container">
      <div class="row" style="text-align: center; color: red;">
        <h2>
          <center>Danh Sách Bài Viết</center>
        </h2>
      </div>
      <table width="300" border="1">
        <?php 
  	while($row=mysqli_fetch_array($result))
	{
  ?>
        <div class="col-md-4" style="margin: 0 -25px 0 1px;">
          <div style="border: 1px solid #8AB570;border-radius: 10px;max-height: 2000px; width: 100%;padding: 0 15px 0 15px;">
            <center>
              <h3 class="home_category_title" style="overflow: none;text-overflow: ellipsis;height:30px;color:#000; font-size:14px;">
                <div class="title" Style="color: red;">
                  <h4>
                    <?php echo $row['title']; ?>
                  </h4>
                </div>
                <div class="intro" style="height:31px;  overflow:hidden;">
                  <?php echo $row['intro']; ?>
                </div>
            </center><br><br>
            <div class="home_category_image">
              <center>
                <img src="Image/<?php echo $row['image_link'];?>" height="100" width="100">
              </center>
            </div>
            <br /><b>Ngày tạo (
              <?php echo date("m/d/Y", strtotime($row['created']))?>) </b> - Lượt xem
            (<b>
              <?php echo $row['count_view']; ?></b>)
            -- <a href="index.php?id=<?php echo $row['id'];?>" onclick="return sure();">xóa</a>--
            <a href="update.php?id=<?php echo $row['id'];?>">Update</a>
            <br />
            <center><a class="btn btn-2" href="see_more.php?id=<?php echo $row['id'];?>"> Xem Ngay</a></center><br />
          </div>
        </div>
    </div>

    <?php
	}
  ?>
    </table>
  </div>
  </div>
  </div>
  </div>
  </div>
  <div class="scrollToTop" data-toggle="" data-placement="left" title="Scroll to Top" style="right: 50px; top: 288px;">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3rQQ0rWbeZeKnq-hSAT2rm047yDw2vckscVxUDEhOvCEdVAm1" style="width: 30px; height: 30px;">
  </div>
  <div id="footer">
    <div class="col-sm-12">
      <div class="row">
        <div class="home_category_inner">
          <div class="col-sm-4">
            <div style="border: 0px solid #3F0;max-height: 410px;margin:5px 50px;">
              <h3 class="home_category_title">
                <br>
                <span>INDEX PAGE NEWS</span>
              </h3>
              <br> My name's Tinh. I'm nineteen years old. I'm from Tra Vinh province. I'm a student in Can Tho
              University Software Center.
              <div class="home_category_content">
                <span class="home_category_desc">
                </span>
                <br />
                <br />
              </div>
            </div>
          </div>
          <div class="col-sm-4" style="">
            <div style="border: 0px solid #3F0;margin:25px -30px;">
              <h3>&nbsp;&nbsp; THÔNG TIN LIÊN HỆ
              </h3>
              <div class="home_category_image">
                <a href="#" style="margin-left: 20px; color:#fff;  text-decoration: none;">
                  <span class="glyphicon glyphicon-home"></span>&nbsp; Trần Hưng Đạo street
                  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Ninh Kiều, Cần thơ
                </a>
                <br>
                <br>
                <a href="#" style="margin-left: 20px; color:#fff; text-decoration: none;">
                  <span class="glyphicon glyphicon-home"></span>&nbsp; 219, ấp Phố, xã An Quảng Hữu
                  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; huyện Trà Cú, tỉnh Trà Vinh.
                </a>
                <br>
                <br>
                <a href="#" style="margin-left: 20px; color:#fff;  text-decoration: none;">
                  <span class="glyphicon glyphicon-earphone"></span>&nbsp; 01694595117
                </a>
                <br>
                <br>
                <a href="#" style="margin-left: 20px; color:#fff;  text-decoration: none;">
                  <span class="glyphicon glyphicon-envelope"></span>&nbsp; vovantinhts@gmail.com
                </a>
              </div>
              <br />
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-4" style=" right: 170px;">
          <div style="border: 0px solid #3F0;margin: 15px 50px 0 0;">
            <h3><br />
              <span >FANPAGE(chưa có!)</span>
            </h3>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFAPtivi%2F%3Ffb_dtsg_ag%3DAdwQFtf1uGNrJDyyRbYROL1pbBmdzKuMryYBv2Q_6mE6rw%253AAdyFtPPgSepY9Rhrbee9fAB3gQzkAiZ_qlw_Ac43iEwgfw&tabs=timeline&width=292&height=1000&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
            width="300" height="220" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            <br>
          </div>
        </div>

      </div>
    </div>
    <hr style="color:#fff;">
  </div>
</body>

</html>