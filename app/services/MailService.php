<?php

include __DIR__ . '/../librarys/Mailer/src/PHPMailer.php';
include __DIR__ . '/../librarys/Mailer/src/SMTP.php';
include __DIR__ . '/../librarys/Mailer/src/Exception.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

if(isset($_POST["send"])){

    if($_POST["send"]=="mail"){

        $mail->isSMTP();
        $mail->SMTPDebug = 0 ;
        $mail->Host = HOST;
        $mail->Port = PORT;
        $mail->SMTPAuth = SMTP_AUTH; //
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Username = REMITENTE;
        $mail->Password = PASSWORD;

        $mail->setFrom(REMITENTE, NOMBRE);
        $mail->addAddress($_POST["destinatario"]);

        $mail->isHTML(true);

        $mail->Subject = utf8_decode($_POST["motivo"]);
        $mail->Body = utf8_decode($_POST["contenido"]);

        if(!$mail->send()){
            error_log("Mailer no se pudo enviar el correo!" );
			$body = array("errno" => 1, "error" => "No se pudo enviar.");
        }else{
			$body = array("errno" => 0, "error" => "Enviado con exito.");
		}   
    }else{
		$body= array("errno" => 2, "error" => "falta accion mail");
	}
}else{

	$body = array("errno" => 3, "error" => "falta variable send");
}

header("Content-Type: application/json");

echo json_encode($body);
 
?>
