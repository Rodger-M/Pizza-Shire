<?php
session_start ();
 
// Confere se o usuário está logado e encaminha para a tela de login caso não esteja
// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] != true){
    header("location: ../login.php");
    exit;
}

// Arquivo de configuração
require_once "config.php";

$cod_exlcusao = $_POST["exclui"];
$cod_carrinho = $_POST["excluireg"];
$cod_cliente = $_SESSION["cod"];

// Comando SQL para remover registro
$query = "DELETE FROM carrinho WHERE (cod_produto = $cod_exlcusao) AND (cod_carrinho = $cod_carrinho)";
if (mysqli_query($link, $query)) {
    header("location: ../carrinho-teste.php");
} else {
    echo "Erro ao tirar item do pedido: " . mysqli_error($link);
}


/* close connection */
mysqli_close($link);
?>