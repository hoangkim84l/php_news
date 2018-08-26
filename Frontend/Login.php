<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
</head>
<body>
    <?php
     include("../Include/connection.php");   
?>
<?php
session_start();
if (isset($_POST['btn_log'])) 
{
    $username=$_POST['username'];
    $password = md5($_POST['password']);  
     $sql="select * from admin where username='$username' and password ='$password'";
    $result= mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0)
  {
    echo "<script>alert('login success');</script>";
    echo '<meta http-equiv="refresh" content="0;url=News/index.php"/>';
    }
  else{
    echo "<script>alert('login not success');</script>";
    echo '<meta http-equiv="refresh" content="0;url=register.php"/>';
        } 
}
?>
        <form action="" method="POST" enctype="multipart/form-data" id="form" name="form">
        <fieldset>
        <legend style="color: #0079BF;">LOGIN</legend>
            Username
            <br>
            <input type="text" name="username" placeholder="Username" id="username" style="width:200px">
            <br> Password
            <br>
            <input type="password" name="password" placeholder="Password" id="password" style="width:200px">
            <br>
            <input type="submit" value="Login" name="btn_log" id="btn_log">
            </fieldset>
        </form>
</body>
</html>