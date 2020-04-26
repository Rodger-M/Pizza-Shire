<?php
// Inicia a sessão
session_start();
 
// Limpa variáveis da sessão
$_SESSION = array();
 
// Elimina a sessão
session_destroy();
 
// Volta para a tela de login (ajustar para o index normal, onde divide login e login adm)
header("location: ../adm-login.php");
exit;
?>