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
     include("../../../Include/Connection.php");   
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
    echo '<meta http-equiv="refresh" content="0;url=../../Login.php"/>';
    }
  else{
    echo "<script>alert('email not success');</script>";
    echo '<meta http-equiv="refresh" content="0;url=forgot_pass/forgot_pass.php"/>';
        } 
    }
?>
<div class="container">
    <div class="row">
        <form method="POST" enctype="multipart/form-data" id="form" name="form">
       
        <legend style="color: red;">FORGOT PASSWORD</legend>
        <div class="col-sm-6">
          <p>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email" require>
          </p>
        </div>
        <div class="col-sm-6">
          <p>
            <label for="To">Tên Người Nhận</label>
            <input id="To" type="text" name="to" class="form-control" placeholder="Nhập Tên Người Nhận" require>
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
<?php
if(isset($_POST['btn_submit']))
{
    include('class.smtp.php');
    include "class.phpmailer.php"; 
    $mFrom = 'vovantinhts@gmail.com';  //dia chi email cua ban 
    $mPass = '12345678tinh';       //mat khau email cua ban
    $email = $_POST['email'];
    $To = $_POST['To'];
    $mail             = new PHPMailer();
    $body             = 'Mã số của bạn để khôi phục tài khoản là: ' . rand(1000, 1000000);   // Noi dung email
    $title = 'Kích hoạt tài khoản'  ;   //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom; 
    $mail->Password   = $mPass;
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('vovantinhts@gmail.com', 'vovantinhts@gmail.com'); 
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $mail->AddAddress($email, $To);
if(!$mail->Send()) {
        echo 'Co loi!';
         
    } else {
         
        echo 'Check mail!!!';
    }
  }
?>
</body>
</html>