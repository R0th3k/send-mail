<?php
  $sitio = 'dev.hektor.mx/send';
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST["name"];
    $correo = $_POST["email"];
    $telefono = $_POST["phone"];
    $asunto = $_POST["subject"];
    $mensaje = $_POST["message"];


    $destinatarioCorreo = "dev@hektor.mx";
    $asuntoMail = "Contacto desde el sitio: " . "(". $asunto.")";


    include 'mail-templates/contact.php';

    $headers = 'From: '.$correo."\r\n".
              'Reply-To:'.$correo."\r\n".
              'X-Mailer: PHP5\n';
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if(mail ($destinatarioCorreo, $asuntoMail, $contenidoCorreo, $headers) == true){
      echo"true";
    }else{
      echo "false";
    }
  }else{
    header("Location: https://$sitio/");
  }


?>