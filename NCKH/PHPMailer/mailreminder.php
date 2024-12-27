<?php

    include_once 'class.phpmailer.php';
    include_once 'class.smtp.php';
    $mail = new PHPMailer(true);
    
    try {
    //Server settings
    $mail->CharSet   = 'UTF-8';
    $mail->SMTPDebug = 0;        //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                 //Enable SMTP authentication
    $mail->Username   = 'huuduc.ng13@gmail.com';  //SMTP username - điền gmail của mình vào
    $mail->Password   = 'ahhsdgssbs';      //SMTP password-- điền mật khẩu của mình vào
    $mail->SMTPSecure = 'tls';                //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('systemtest@gmail.com', 'GIÁO VIÊN HƯỚNG DẪN ĐỒ ÁN NHẮC BẠN');
    $mail->addAddress($_SESSION['email'], $_SESSION['namemail']);     //Add a recipient
     
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'THÔNG BÁO TỪ GIÁO VIÊN HƯỚNG DẪN ĐỒ ÁN';
    $mail->Body    = $_SESSION['contentremider'];
   
    $mail->send();
    
} catch (Exception $e) {
    echo "lỗi: {$mail->ErrorInfo}";
}
    

 ?>