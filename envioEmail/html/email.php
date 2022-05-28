<?php
$nome = utf8_decode($_POST['nome']);
$email = utf8_decode($_POST['email']);
$mensagem = utf8_decode($_POST['mesage']);
$smtp_debug = true;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();  
$mail->isSMTP();

//config do servidor de emial;

$mail->Host = 'smtp.gmail.com';
$mail->Port ='587';
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = 'true';
$mail->Usernamer = 'kiruet1@gmail.com';
$mail->Password = 'kirukiru12';

//config da mensagem;

$mail->setFrom($mail->Usernamer,'Pedro'); //remetente
$mail->addAddress('pedro-kdteixeira@educar.rs.gov.br'); //Destinatario
$mail->Subject = 'Envio teste email'; //assunto

$conteudo_email = "mensagem recebida de $nome ($email):
<br></br>
mensagem:<br>
$mensagem
";
$mail->isHTML(true);
$mail->Body = $conteudo_email;
$mail->AltBody ='conteudo do email em texto';
if($mail->send()){
  echo "Email eniviado";
}else{
  echo "Seu email não foi enviado" . $mail->ErrorInfo;
}
