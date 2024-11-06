<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/PHPMailer/src/Exception.php';
require 'assets/PHPMailer/src/PHPMailer.php';
require 'assets/PHPMailer/src/SMTP.php';

$name = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$saran = htmlspecialchars($_POST['saran']);
 
//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'danysyahfrudin0711@gmail.com';                     //SMTP username
    $mail->Password   = 'bnvo azrf fabc zudp';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('danysyahfrudin0711@gmail.com', 'Saran Gfood');
    $mail->addAddress('danysyahfrudin0711@gmail.com', 'Gfood');     //Add a recipient 
    $mail->addAddress($email, 'Gfood');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Saran Gfood Dari'.$nama;
    $mail->Body    = $nama.'<br>'.$email.'<br>'.$saran; 

    $mail->send();
    header("location:index.php?alert=Pesan Terkirim");
} catch (Exception $e) {
    header("location:index.php?alert=Pesan Gagal");
}
?>