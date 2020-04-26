<?php
// Inicia a sessão
session_start();

// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] != true){
    header("location: ../login.php");
    exit;
}

/* else{
    echo '<script type="text/javascript">
    menuPerfil();
    </script>';
} */

// Arquivo de configuração
require_once "config.php";
//require_once "shop.php";

$cod_produto = $_POST["cod_produto"];
$cod_usuario = $_SESSION["id"];
$descricao = $_POST["descricao"];
$quantidade = $_POST["quantidade"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];
$complemento = $_POST["complemento"];
$_SESSION["precobase"] = $preco;

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
  		$_SESSION["pizza"] = $param_descricao;
    	if($param_categoria  == "Pizza"){
    		header("location: ../shopmetade-front.php");
    	}else{
        	// Redireciona para o shop
	        header("location: ../menu.php");}
    } else{
        echo "Algo deu errado, tente novamente mais tarde!";
    }
}
/* close connection */
#mysqli_close($link);
?>