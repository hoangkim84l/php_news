<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
</head>
<body>
<?php
     include("../../Include/Connection.php");   
?>
<?php 
    if(isset($_POST['btn_submit']))
    {
        $email=$_POST['email'];
        $sql="select * from admin where email='$email'";
        $result= mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0)
  {
    echo "<script>alert('Email success');</script>";
    echo '<meta http-equiv="refresh" content="0;url=../Login.php"/>';
    }
  else{
    echo "<script>alert('email not success');</script>";
    echo '<meta http-equiv="refresh" content="0;url=forgot_pass.php"/>';
        } 
    }
?>
<div class="container">
    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data" id="form" name="form">
       
        <legend style="color: red;">FORGOT PASSWORD</legend>
        <div class="col-sm-6">
          <p>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email" require>
          </p>
        </div>
        <div class="col-sm-12">
          <p>
            <input class="submit btn btn-default" type="submit" value="submit" name="btn_submit" id="btn_submit">
          </p>
        </div>
        </form>
        </div>
        </div>
</body>
</html>