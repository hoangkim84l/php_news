<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
  <script src="validate.js" type="text/javascript"></script>
  <style>
    label.error{
			color: green;
		}
	    </style>
</head>

<body>
  <?php
    include("../../Include/connection.php");
    if(isset($_POST['btnadd']))
    {  
      $title    =$_POST['title'];
      $intro    =$_POST['intro'];
      $content  =$_POST['content'];
      $meta_desc=$_POST['meta_desc'];
      $meta_key =$_POST['meta_key'];
      $created  =$_POST['created'];
      $feature  =$_POST['feature'];
      $taptin   =$_FILES['image_link'];
      if($taptin['type']=="image/jpg" || $taptin['type']=="image/jpeg" || $taptin['type']=="image/png" ||$taptin['type']=="image/gif")
        {
            if($taptin['size']<=9614400)
            {
              copy($taptin['tmp_name'],"Image/".$taptin['name']);
              $image_link=$taptin['name'];
              $sql="insert into news values('','$title','$intro','$content','$meta_desc','$meta_key','$image_link','$created','$feature','0')";
                    // var_dump($sql);
                    // exit();
                    mysqli_query($conn,$sql);
                    echo "<script>alert('Add is successful!')</script>";
                    echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
              }
            else
              {
                echo "hinh co kich thuoc qua lon";
              }
          } 
          else
            {
              echo "không đúng dịnh dạng";
            }
    }
    ?>
    <div class="container">
      <div class="row">
          <form action="" method="POST" enctype="multipart/form-data" name="fadd" id="fadd">
          
            <legend>Thông Tin Bài Viết</legend>
            <div class="col-sm-6">
              <p>
                <label for="titile">Tiêu đề</label>
                <input id="title" type="text" name="title" class="form-control">
              </p>
            </div>
            <div class="col-sm-6">
              <p>
                <label for="intro">Giới thiệu</label>
                <input id="ỉntro" type="text" name="intro" class="form-control">
              </p>
            </div>
            <div class="col-sm-6">
              <p>
                <label for="content">Mô tả</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
              </p>
            </div>
            <div class="col-sm-6">
              <p>
                <label for="meta_desc">Mô tả SEO</label>
                <input id="meta_desc" type="text" name="meta_desc" class="form-control">
              </p>
            </div>

            <div class="col-sm-6">
              <p>
                <label for="meta_key">Key SEO</label>
                <input id="meta_key" type="text" name="meta_key" class="form-control">
              </p>
            </div>
            <div class="col-sm-6">
              <p>
                <label for="image_link">Ãnh đại diện</label>
                <input type="file" name="image_link" id="image_link" class="form-control">
              </p>
            </div>

            <div class="col-sm-6">
              <p>
                <label for="created">Ngày tạo</label>
                <input id="created" type="date" name="created" onchange="myFunction()" class="form-control">
              </p>
            </div>
            <div class="col-sm-6">
              <p>
                <label for="feature">Hiện trang chủ</label>
                <input id="feature" type="text" name="feature" class="form-control">
              </p>
            </div>

            <div class="col-sm-12">
              <p>
                <input class="submit btn btn-info" type="submit" value="Thêm Mới" name="btnadd" id="btnadd">
              </p>
            </div>
        </form>
      </div>
    </div>
  
  <script>
    function myFunction() {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();

      if (dd < 10) {
        dd = '0' + dd
      }

      if (mm < 10) {
        mm = '0' + mm
      }

      today = yyyy + '-' + mm + '-' + dd;
      var x = document.getElementById("created").value;

      if (x < today || x > today) {
        alert("ngày nhập phải là ngày hiện tại")
      }
    }
  </script>
</body>

</html>