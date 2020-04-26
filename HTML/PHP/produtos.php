<?php
// Arquivo de configuração
require_once "config.php";

/* Cria a query ativos*/
$query = "SELECT cod_produto, descricao, categoria, preco, disponibilidade, imagem FROM Produto WHERE disponibilidade = 'Disponivel' ORDER BY categoria DESC";


if ($result = mysqli_query($link, $query)) {
    echo '<form method="post" action="excluiproduto.php">';

    echo '<div id="pizzas">
            <h2>Pizzas</h2>
                <div class="container-fluid container-prod">';

    /* Faz o array */
    while ($obj = mysqli_fetch_object($result)) {

        printf(
            '<div class="box-produto">
                    <img class="img-produto" src="Pizzaria/uploads/%s" alt="Produto">
                    <div>
                        <p class="title-prod">%s</p>
                        <p class="ingr-prod">%s</p>
                        <a class="btn-prod" href="#"><i class="fas fa-plus"></i></a>
                    </div>
                </div>', $obj->imagem, $obj->descricao, $obj->categoria
        );

    }
    
    echo '</div></div>';
    
    echo '</form>';

    /* Libera o resultado */
    mysqli_free_result($result);
}

/* Cria a query inativos*/
/*
$query = "SELECT cod_produto, descricao, categoria, preco, disponibilidade, imagem FROM Produto WHERE disponibilidade = 'Indisponivel'";
*/


/*if ($result = mysqli_query($link, $query)) {
    echo '<h1>Inativos</h1>';
    echo '<form method="post" action="reativaproduto.php">';

     Faz o array 
    while ($obj = mysqli_fetch_object($result)) {
        printf ('<div> %s, %s, %s, %s <input type="image" src="uploads/%s" height = 16px width = 16px><input type="hidden" name="reativa" value="%s"><input type="image" src="https://img.pngio.com/cycle-arrow-png-images-vector-and-psd-files-free-download-on-cycle-arrow-png-260_263.png" height = 16px width = 16px> </div>', $obj->descricao, $obj->categoria, $obj->preco, $obj->disponibilidade, $obj->imagem, $obj->cod_produto);
    }
    echo '</form>';

     Libera o resultado 
    mysqli_free_result($result);
}*/

/* Fecha conexão (não utilizado por dar erro ao excluir) */
#mysqli_close($link);
?>