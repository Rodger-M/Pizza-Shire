<?php
// Inicia a sessão
session_start();
 
// Arquivo de configuração
require_once "config.php";

$cliente = $_SESSION["id"];

/* Cria a query ativos*/
$query = "SELECT cod_pedido, cod_endereco, forma_pagamento, frete, status FROM pedido WHERE cod_usuario = $cliente AND status 'Em andamento'";


	if ($result = mysqli_query($link, $query)) {
		echo '<h1>Carrinho</h1>';
	        echo '<table>
			<thead>
		            <tr scope="col">Descrição</tr>
		            <tr scope="col">Quantidade</tr>
		            <tr scope="col">Preço</tr>
		            <tr scope="col">Categoria</tr>
		            <tr scope="col">Complemento</tr>
			</thead>
	
			<tbody>';

	    /* Faz o array */
	    while ($obj = mysqli_fetch_object($result)) {
            $obj->Preco = number_format(doubleval($obj->Preco),2,",",".");
            printf ('<div> <tr scope="row">
            <td>%s</td>
            <td>R$ %s</td>
            <td>%s</td>
            <td>%s</td>
            <form method="post" action="excluidopedido.php">
            <input type="hidden" name="exclui" value="%s">
            <input type="hidden" name="excluireg" value="%s">
            <td><input type="image" src="https://icons-for-free.com/iconfiles/png/512/trash+bin+icon-1320086460670911435.png" height = 16px width = 16px></td>
            </form> 
            </div>', $obj->descricao, $obj->Preco, $obj->categoria, $obj->complemento, $obj->cod_produto, $obj->cod_carrinho);
	    }
	    echo '</tbody>
	    </table>';
	    
/* Libera o resultado */
mysqli_free_result($result);
}

?>