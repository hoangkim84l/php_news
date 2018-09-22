<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    session_start();
     include("../Include/Connection.php");   
?>
<?php
if (isset($_POST['btn_log'])) 
{
    $username=$_POST['username'];
    $password = md5($_POST['password']);  
     $sql="select * from admin where username='$username' and password ='$password'";
    $result= mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0)
  {
    $_SESSION['username']=$username;
    echo "<script>alert('login success');</script>";
    echo '<meta http-equiv="refresh" content="0;url=News/index.php"/>';
    }
  else{
    echo "<script>alert('login not success');</script>";
    echo '<meta http-equiv="refresh" content="0;url=Login.php"/>';
        } 
}
?>
<div class="container">
    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data" id="form" name="form">
       
        <legend style="color: #0079BF;">LOGIN</legend>
        <div class="col-sm-6">
          <p>
            <label for="username">Username</label>
            <input id="username" type="text" name="username" class="form-control" placeholder="Username">
          </p>
        </div>
        <div class="col-sm-6">
          <p>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control" placeholder="Password">
          </p>
        </div>
            <input type="submit" value="Login" name="btn_log" id="btn_log">
            <a href="News/forgot_pass.php" style="float: right; border: 1px solid green; color: #767676; background-color: #E1E1E1; text-decoration: none;" >&nbsp; Quên Mật Khẩu &nbsp; </a>
        </form>
        </div>
        </div>
</body>
</html>