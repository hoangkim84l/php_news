<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
<?php
include("../Include/Connection.php");
?>
<?php 
    if(isset($_POST['btn_submit']))
    {
        $id=$_POST['id'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $name=$_POST['name'];
        $admin_group_id=$_POST['admin_group_id'];
        $email=$_POST['email'];
        $sql="INSERT INTO admin VALUES('','$username','$password','$name','','$email')";
        mysqli_query($conn,$sql);
        echo'<meta http-equiv="refresh" content="0;url=Login.php">';
    }
?>
<div class="container">
    <div class="row">
    <form name="f" action="" method="POST" enctype="multipart/form-data">
    <legend style="color: #0079BF;">REGISTER</legend>
    <div class="col-sm-6">
          <p>
            <label for="id">ID</label>
            <input id="id" type="text" name="id" class="form-control" placeholder="ID không Cần Nhập" readonly>
          </p>
        </div>
        <div class="col-sm-6">
          <p>
            <label for="username">Username</label>
            <input id="username" type="text" name="username" class="form-control" placeholder="Nhập Username" require>
          </p>
        </div>
        <div class="col-sm-6">
          <p>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control" placeholder="Nhập password" require>
          </p>
        </div>
        <div class="col-sm-6">
          <p>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control" placeholder="Nhập Name" require>
          </p>
        </div>
        <div class="col-sm-6">
          <p>
            <label for="Admin_group_id">Admin_group_id</label>
            <input id="Admin_group_id" type="text" name="Admin_group_id" class="form-control" placeholder="Nhập Admin_group_id" require>
          </p>
        </div>
        <div class="col-sm-6">
          <p>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email" require>
          </p>
        </div>
        <div class="col-sm-12">
          <p>
            <input class="submit btn btn-success" type="submit" value="Đăng Ký" name="btn_submit" id="btn_submit">
          </p>
        </div>
    </form>
    </div>
    </div>
</body>
</html>