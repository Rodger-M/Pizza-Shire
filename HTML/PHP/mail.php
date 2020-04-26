<?php
session_start();
$email = $_POST['email'];
$tipomsg = $_POST['tipomsg'];
$mensagem = $_POST['mensagem'];
$formcontent="De: $email \n Mensagem: $mensagem";
$recipient = "victornfb@keydev.com.br";
$subject = "Contato - KeyDev";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
/*echo "<script type='text/javascript'>alert('Agradecemos o seu feedback!');</script>";*/
$_SESSION["mail"] = 1;
header("location: http://br910.teste.website/~keydev44");
exit;
?>