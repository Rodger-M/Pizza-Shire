<?php

// Arquivo de configuração
require_once "config.php";
require_once "shop.php";

$cod_usuario = $_SESSION["id"];
$cod_endereco = $_POST["criar"];
$forma_pagamento = $_POST["Pagamento"];
$frete = 4.0;

// Preparando o INSERT para o BD
$sql = "INSERT INTO pedido (cod_cliente, cod_endereco, forma_pagamento, frete) VALUES (?, ?, ?, ?)";

if($stmt = mysqli_prepare($link, $sql)){
    // Vinculando vareaveis como parametros
    mysqli_stmt_bind_param($stmt, "ssss", $param_cod_usuario, $param_cod_endereco, $param_forma_pagamento, $param_frete);

    // Definindo parametros
    $param_cod_usuario = $cod_usuario;
    $param_cod_endereco = $cod_endereco;
    $param_forma_pagamento = $forma_pagamento;
    $param_frete = $frete;

    // Executando
    if(mysqli_stmt_execute($stmt)){
        }
}else{echo "Algo deu errado, tente novamente mais tarde!";}

$query = "SELECT cod_pedido FROM pedido WHERE cod_cliente = $cod_usuario ORDER BY cod_pedido DESC LIMIT 1";
	if ($result = mysqli_query($link, $query)) {
	    /* Faz o array */
	    while ($obj = mysqli_fetch_object($result)) {
         $cod_pedido = $obj->cod_pedido;
        }}
    /* Cria a query ativos*/
$querycarrinho = "SELECT cod_produto, descricao, Quantidade, Preco, categoria, complemento FROM carrinho WHERE cod_usuario = $cod_usuario";


	if ($result = mysqli_query($link, $querycarrinho)) {
	    /* Faz o array */
	    while ($obj = mysqli_fetch_object($result)) {
            $sqlinsert = "INSERT INTO pedido_produto (cod_pedido, cod_produto, descricao, quantidade, preco, categoria, complemento) VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sqlinsert)){
            mysqli_stmt_bind_param($stmt, "sssssss", $param_cod_pedido, $param_cod_produto, $param_descricao, $param_quantidade, $param_preco, $param_categoria, $param_complemento);

            // Definindo parametros
            $param_cod_pedido = $cod_pedido;
            $param_cod_produto = $obj->cod_produto;
            $param_descricao = $obj->descricao;
            $param_quantidade = $obj->Quantidade;
            $param_preco = $obj->Preco;
            $param_categoria = $obj->categoria;
            $param_complemento = $obj->complemento;
                
    // Executando
    if(mysqli_stmt_execute($stmt)){
        }
}else{echo "Algo deu errado, tente novamente mais tarde!";}}}

    /* Esvazia o carrinho*/
$limpacarrinho = "DELETE FROM carrinho WHERE cod_usuario = $cod_usuario";


	if ($result = mysqli_query($link, $limpacarrinho)) {
	    header("location: ../menu.php");
	    }else{echo "Algo deu errado, tente novamente mais tarde!";}

/* close connection */
#mysqli_close($link);
?>