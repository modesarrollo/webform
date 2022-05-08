<?php
//Datos asignados a la inscripción mediante POST
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];
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

$para = 'andres.rodriguez@mioficina.co';
$asunto = 'Nuevo mensaje de inscripción al evento';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location:index.php");

$paraCliente    = $email;
$tituloCliente  = "Su inscripción ha sido realizada";
$mensajeCliente = "Buen día " . $_POST['nombre'] . ". Gracias por inscribirse a nuestro evento </strong>Pruebas de continuidad con VMware vSphere y AWS</strong>";

$cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
$cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabecerasCliente .= 'From: Mi Oficina.co<servicios@mioficina.co>';
$enviadoCliente   = mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);

?>