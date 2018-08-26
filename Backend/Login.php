<?php
include("../Include/connection.php");   
    session_start();
    if(isset($_POST['btn_log']))
    {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $sql="select* from admin where username='$username' and password='$password'";
        $result= mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            echo"<script>alert('Login Success');</script>";
            echo'<meta http-equiv="refresh" content="0;News/index.php"/>';
        }
        else{
            echo"<sccript>alert('Login NOT Success');</script>";
            echo'<meta http-equiv="refresh" content="0;register.php"/>';
        }
    }
?>