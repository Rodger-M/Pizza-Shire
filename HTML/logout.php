<?php
// Inicia a sessão
session_start();
 
// Limpa variáveis da sessão
$_SESSION = array();
 
// Elimina a sessão
session_destroy();
 
// Volta para a tela de login
header("location: login.php");
exit;
?>