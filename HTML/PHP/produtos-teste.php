<?php
// Arquivo de configuração
require_once "config.php";

session_start();

/* Cria a query de pizza*/
$querypizza = "SELECT cod_produto, descricao, ingredientes, preco, disponibilidade, categoria, imagem FROM produto WHERE disponibilidade = 'Disponivel' AND categoria = 'Pizza'";

$cod_usuario = $_SESSION["id"];


if ($result = mysqli_query($link, $querypizza)) {
    

    echo '<div id="pizzas">
            <h2>Pizzas</h2>
                <div class="container-fluid container-prod">';

    /* Faz o array */
    while ($obj = mysqli_fetch_object($result)) {

        printf(
            '<div class="box-produto">
		<form method="post" action="Pizzaria/adicionaraopedido.php">
                <img class="img-produto" src="Pizzaria/uploads/%s" alt="Produto">
                <div>
                    <p class="title-prod">%s</p>
                    <p class="ingr-prod">%s</p>
                    <p class="ingr-prod">R$ %s</p>
                    
                        <input type="hidden" name="cod_produto" value="%s">
                        <input type="hidden" name="cod_usuario" value="%s">
                        <input type="hidden" name="descricao" value="%s">
                        <input type="hidden" name="quantidade" value="1">
                        <input type="hidden" name="preco" value="%s">
                        <input type="hidden" name="categoria" value="%s">
                        <input type="hidden" name="complemento" value="OK">
                        <button type="submit" class="btn-prod" style="border: none;">
                            <i class="fas fa-plus"></i>
                        </button>
                        
                    
                </div>
                </form>
            </div>', $obj->imagem, $obj->descricao, $obj->ingredientes, $obj->preco, $obj->cod_produto, $cod_usuario, $obj->descricao, $obj->preco, $obj->categoria
        );

    }

    echo '</div></div>';



}

/* Cria a query de bebidas*/
$querybebida = "SELECT cod_produto, descricao, ingredientes, preco, disponibilidade, categoria, imagem FROM produto WHERE disponibilidade = 'Disponivel' AND categoria = 'Bebida'";


if ($result = mysqli_query($link, $querybebida)) {


    echo '<div id="bebidas">
            <h2 style="color: #fff;">Bebidas</h2>
                <div class="container-fluid container-prod">';

    /* Faz o array */
    while ($obj = mysqli_fetch_object($result)) {
        printf(
            '<div class="box-produto">
            <form method="post" action="Pizzaria/adicionaraopedido.php">
                <img class="img-produto" src="Pizzaria/uploads/%s" alt="Produto">
                <div>
                    <p class="title-prod">%s</p>
                    <p class="ingr-prod">%s</p>
                    <p class="ingr-prod">R$ %s</p>
                    
                        <input type="hidden" name="cod_produto" value="%s">
                        <input type="hidden" name="cod_usuario" value="%s">
                        <input type="hidden" name="descricao" value="%s">
                        <input type="hidden" name="quantidade" value="1">
                        <input type="hidden" name="preco" value="%s">
                        <input type="hidden" name="categoria" value="%s">
                        <input type="hidden" name="complemento" value="OK">
                        <button type="submit" class="btn-prod" style="border: none;">
                            <i class="fas fa-plus"></i>
                        </button>
                    
                </div>
                </form>
            </div>', $obj->imagem, $obj->descricao, $obj->ingredientes, $obj->preco, $obj->cod_produto, $cod_usuario, $obj->descricao, $obj->preco, $obj->categoria
        );
    }

    echo '</div></div>';



}

/* Cria a query de pizza*/
$querysobremesa = "SELECT cod_produto, descricao, ingredientes, preco, disponibilidade, categoria, imagem FROM produto WHERE disponibilidade = 'Disponivel' AND categoria = 'Sobremesa'";


if ($result = mysqli_query($link, $querysobremesa)) {


    echo '<div id="sobremesas">
            <h2>Sobremesas</h2>
                <div class="container-fluid container-prod">';

    /* Faz o array */
    while ($obj = mysqli_fetch_object($result)) {
    echo '';
        printf(
            '<div class="box-produto">
            <form method="post" action="Pizzaria/adicionaraopedido.php">
                <img class="img-produto" src="Pizzaria/uploads/%s" alt="Produto">
                <div>
                    <p class="title-prod">%s</p>
                    <p class="ingr-prod">%s</p>
                    <p class="ingr-prod">R$ %s</p>
                    
                        <input type="hidden" name="cod_produto" value="%s">
                        <input type="hidden" name="cod_usuario" value="%s">
                        <input type="hidden" name="descricao" value="%s">
                        <input type="hidden" name="quantidade" value="1">
                        <input type="hidden" name="preco" value="%s">
                        <input type="hidden" name="categoria" value="%s">
                        <input type="hidden" name="complemento" value="OK">
                        <button type="submit" class="btn-prod" style="border: none;">
                            <i class="fas fa-plus"></i>
                        </button>
                    
                </div>
                </form>
            </div>', $obj->imagem, $obj->descricao, $obj->ingredientes, $obj->preco, $obj->cod_produto, $cod_usuario, $obj->descricao, $obj->preco, $obj->categoria
        );
    }

    echo '</div></div>';


}
?>