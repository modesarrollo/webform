<?php
//Datos asignados a la inscripción mediante POST
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'modules/PHPMailer/PHPMailer/Exception.php';
require 'modules/PHPMailer/PHPMailer/PHPMailer.php';
require 'modules/PHPMailer/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.mioficina.co';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = auto;            //Enable implicit TLS encryption
    $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Formato del asunto
$header = 'From: ' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";
//Formato del mensaje
$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $email . " \r\n";
$mensaje = "De la empresa: " . $empresa . ",\r\n";
$mensaje = "Su número de teléfono es: " . $telefono . ",\r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

    //Recipients
    $mail->setFrom('andres.rodriguez@mioficina.co', 'Mi Oficina.co');
    $mail->addAddress($email, $nombre);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nuevo mensaje de inscripción al evento';
    $mail->Body    = utf8_decode($mensaje);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    mail($mail, utf8_decode($mensaje), $header);

header("Location:index.php");

$paraCliente    = $email;
$tituloCliente  = "Su inscripción ha sido realizada";
$mensajeCliente = "Buen día " . $_POST['nombre'] . ". Gracias por inscribirse a nuestro evento </strong>Pruebas de continuidad con VMware vSphere y AWS</strong>";

$cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
$cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabecerasCliente .= 'From: Mi Oficina.co<servicios@mioficina.co>';
$enviadoCliente   = mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);

if($mail->send()) {
    echo 'Error, mensaje no enviado';
    echo 'El mensaje no se pudo enviar. Error del mensaje: ' . $mail->ErrorInfo;    
} else {
    echo 'Su mensaje ha sido enviado exitosamente';
}