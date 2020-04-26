<?php
// Inicia a sessão
session_start();

// Arquivo de configuração
require_once "config.php";

$cod_ped = $_POST["ped"];
$cliente = $_SESSION["id"];

/* Cria a query ativos*/
$query = "SELECT cod_produto, descricao, quantidade, preco, categoria, complemento FROM pedido_produto WHERE cod_pedido = $cod_ped";


if ($result = mysqli_query($link, $query)) {
    echo '<h1>Carrinho</h1>';
    echo '<table class="table table-hover" style="text-align: center;">
			<thead class="thead-dark">
                            <tr>
		            <th scope="col">Produto</th>
		            <th scope="col">Preço</th>
		            <th scope="col">Categoria</th>
		            <th scope="col">Complemento</th>
                            </tr>
			</thead>

			<tbody>';

    /* Faz o array */
    while ($obj = mysqli_fetch_object($result)) {
        printf ('<div> <tr scope="row">
            <td>%s</td>
            <td>R$ %s</td>
            <td>%s</td>
            <td>%s</td>
            </div>', $obj->descricao, $obj->preco, $obj->categoria, $obj->complemento);
    }
    echo '</tbody>
	    </table>';

    /* Libera o resultado */
    mysqli_free_result($result);
}

?>