<?php
// Inicia a sessão
session_start();

// Arquivo de configuração
require_once "config.php";

// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["admlogado"]) || $_SESSION["admlogado"] != true){
    header("location: ../loginadm.php");
    exit;
}

$cod_ped = $_SESSION["ped"];

/* Cria a query do pedido*/
$query = "UPDATE pedido SET status = 'Cancelado' WHERE cod_pedido = $cod_ped";


// Comando SQL para concluir pedido
if (mysqli_query($link, $query)) {
    header("location: ../dashboard.php");
} else {
    echo "Erro ao tirar item do pedido: " . mysqli_error($link);
}


/* close connection */
mysqli_close($link);
?>