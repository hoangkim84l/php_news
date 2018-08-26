<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
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
        $sql="INSERT INTO admin VALUES('','$username','$password','','')";
        mysqli_query($conn,$sql);
        echo'<meta http-equiv="refresh" content="0;url=Login.php">';
    }
?>

   
    <form name="f" action="" method="POST" enctype="multipart/form-data">
    <fieldset>
    <legend style="color: #0079BF;">REGISTER</legend>
    Nhập ID <br>
    <input type="number" name="id" placeholder="Mời nhập ID"><br>
    Username<br>
    <input type="text" placeholder="Mời nhập tên" name="username"><br>
    Password<br>
    <input type="password" placeholder="Mời nhập Password" name="password"><br>
    Name<br>
    <input type="text" name="name" placeholder="nhập tên"><br>
    Admin_group_id<br>
    <input type="number" name="admin_group_id" placeholder="admin_group_id"><br>
    <input type="submit" value="submit" name="btn_submit">
    </fieldset>
    </form>
</body>
</html>