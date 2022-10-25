<?php

$nome = utf8_encode($_POST['nome']);
$sobrenome = utf8_encode($_POST['sobrenome']);
$email = utf8_encode($_POST['email']);

require 'PHPMailer/PHPMailerAutoload.php';

// Método de envio 
$mail = new PHPMailer;
// Inicia a classe PHPMailer
$mail->isSMTP();


//Configurações do servidor de email
$mail->Host = "smtp.gmail.com";
$mail->Port = "587";
$mail->SMTPSecure = "ssl";
$mail->SMTPAuth = "true";
$mail->Username = "contato.plamona@gmail.com";
$mail->Password = "pla123mo123na123";

//Configurações da mensagem
$mail->setFrom($mail->Username,"PlaMoNA"); //Remetente
$mail->addAddress('kathleen.schmidt.katy@gmail.com'); //Desinatario
$mail->Subject = "teste"; //Assunto do email

$conteudo_email = "
testando se vai enviar, feeee, mensagem de $nome $sobrenome ($email);
<br> <br>

";

$mail->Body = $conteudo_email;

if ($mail->send()) {
	echo "Email enviado com sucesso!";
} else {
	echo "Falha ao enviar o email - " . $mail->ErrorInfo;
}