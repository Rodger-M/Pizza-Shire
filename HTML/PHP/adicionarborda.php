<?php
// Inicia a sessão
session_start();

// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] != true){
    header("location: ../login.php");
    exit;
}
// Arquivo de configuração
require_once "config.php";
require_once "shop.php";

$cod_produto = $_POST["cod_produto"];
$cod_usuario = $_SESSION["id"];
$descricao = $_POST["descricao"];
$quantidade = 1;
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];
$complemento = $_POST["complemento"];
$base = $_POST["base"];

// Preparando o INSERT para o BD
$sql = "INSERT INTO carrinho (cod_produto, cod_usuario, descricao, quantidade, preco, categoria, complemento) VALUES (?, ?, ?, ?, ?, ?, ?)";

if($stmt = mysqli_prepare($link, $sql)){
    // Vinculando vareaveis como parametros
    mysqli_stmt_bind_param($stmt, "sssssss", $param_cod_produto, $param_cod_usuario, $param_descricao, $param_quantidade, $param_preco, $param_categoria, $param_complemento);

    // Definindo parametros
    $param_cod_produto = $cod_produto;
    $param_cod_usuario = $cod_usuario;
    $param_descricao = $descricao;
    $param_quantidade = $quantidade;
    $param_preco = $preco;
    $param_categoria = $categoria;
    $param_complemento = $complemento;

    // Executando
        if(mysqli_stmt_execute($stmt)){
        // Redireciona para o shop de adicionais
        header("location: ../shopadicional-front.php");
        }else{
        echo "Algo deu errado, tente novamente mais tarde!";        
    }}

?>