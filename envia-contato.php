<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'mail.aussel.com.br';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "cesar@aussel.com.br";
$mail->Password = "cam123";

$mail->setFrom("cesar@aussel.com.br", "Alura Curso PHP e MySQL");
$mail->addAddress("cesar@aussel.com.br");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
		$_SESSION["success"] = "Mensagem enviada com sucesso";
		header("Location: index.php");
} else {
		$_SESSION["danger"] = "Erro ao enviar mensagem" . $mail->ErrorInfo;
		header("Location: contato.php");
}
die();