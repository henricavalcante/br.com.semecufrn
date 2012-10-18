<?php
$nome		= $_POST["nome"];	
$email		= $_POST["email"];	
$assunto		= $_POST["assunto"];	
$mensagem	= $_POST["mensagem"];	

$Vai 		= "Nome: $nome\n\ntelefone: $email\n\nassunto: $assunto\n\nMensagem: $mensagem\n";

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'semecufrn@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'buggalu123');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		
	$mail->SMTPDebug = 1;		
	$mail->SMTPAuth = true;		
	$mail->SMTPSecure = 'ssl';	
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;  		
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;

  $mail->AddAddress('vieiraanderson@outlook.com', 'Anderson Vieira');
$mail->AddAddress('hnri_mxel@hotmail.com', 'Henri Michel');

	
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo;
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER),
//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

 if (smtpmailer('vieiraanderson@outlook.com', 'semecufrn@gmail.com', 'Mensagens site', 'Mensagens site SEMEC', $Vai)) {

	Header("location:http://www.semecufrn.com.br/"); // Redireciona para uma página de obrigado.

}
if (!empty($error)) echo $error;
?>