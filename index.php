<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-mail</title>
</head>
<body>
    <form method="post">
    <input type="email" name="email">
    <br>
    <input type="password" name="senha">
    <br>
    <textarea min="10" max="10" name="assunto"></textarea>
    <textarea min="10" max="10" name="corpo"></textarea>
    <input type="submit">
    </form>
</body>
</html>
<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $_POST['email'];/*Precisa ta logado pra envia 'rafaelfelipe.martins18@gmail.com'*/
    $mail->Password = $_POST['senha'];/*Precisa ta logado pra envia*/
    $mail->Port = 587;

    /*$mail->setFrom('patogalatico5@gmail.com');/*Envia nao é obriagtorio oq importa é o de cima*/
    $mail->addAddress('tigice9948@superyp.com');/*Recebe*/

    $mail->isHTML(true);
    $mail->Subject = $_POST['assunto']; /*Assunto*/
    $mail->Body = $_POST['corpo'];/*Corpo o conteudo*/
    $mail->AltBody = 'Chegou o email teste do rafaTI487';

    if($mail->send()) {
        echo 'Email enviado com sucesso';
    } else{
        echo 'Email nao enviado';
    }

} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

