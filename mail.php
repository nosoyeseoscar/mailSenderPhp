<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($subject, $body,$email, $name, $html = false){
    //configuración inicial phpmailer
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '181c4090e44142';
    $phpmailer->Password = '52cfcb5fd60d67';

    //añadiendo destinatarios
    $phpmailer->setFrom('contact@miempresa.com', 'Mi Empresa');
    $phpmailer->addAddress($email, $name); 

     //Contenido
     $phpmailer->isHTML(true);//Set email format to HTML
     $phpmailer->Subject = $subject;
     $phpmailer->Body    = $body;

     //Enviar correo
     $phpmailer->send();
}


?>