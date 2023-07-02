<?php
//Import PHPMailer classes into the global namespace
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$body= '';
    $body .= ' Имя : ' .  $_POST['username'] . '<br> ' ;
    $body .= ' Компания : ' .  $_POST['usercompany'] . '<br> ' ;
    $body .= ' Телефон : ' .  $_POST['userphone'] . '<br> ' ;
    $body .= ' Email : ' .  $_POST['useremail'] . '<br> ' ;
    if ($_POST['type']) {
    $body .= ' Направление : ' .  $_POST['type'] . '<br> ' ;
    }
    if ($_POST['vendor_name']) {
    $body .= ' Категория : ' .  $_POST['vendor_name'] . '<br> ' ;
    }
try {





    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                         //Send using SMTP
    $mail->Host       = 'smtp.beget.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kis@busupdev.ru';                     //SMTP username
    $mail->Password   = '4pZn%BYE';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kis@busupdev.ru', 'КИС - Компьютерные информационные системы');
    $mail->addAddress('egai.viktor94@gmail.com');     //Add a recipient
   

 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST['form_place'];
    $mail->Body    = $body;


    $mail->send();



    echo 'Message has been sent';
} catch (Exception $e) {
    echo $body;
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}