
<?php
    include('class.smtp.php');
    include "class.phpmailer.php"; 
    $mFrom = 'vovantinhts@gmail.com';  //dia chi email cua ban 
    $mPass = '12345678tinh';       //mat khau email cua ban
    $nTo='Võ Văn Tính';
    $mTo = 'vvtinha17060@cusc.ctu.edu.vn';   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = 'Test send mail by php';   // Noi dung email
    $title = 'Gửi mail bằng PHPMailer';   //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('vovantinhts@gmail.com', 'vovantinhts@gmail.com'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo 'Co loi!';
         
    } else {
         
        echo 'Check mail!!!';
    }
?>