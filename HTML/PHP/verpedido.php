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
$query = "SELECT cod_produto, descricao, Quantidade, Preco, categoria, complemento FROM pedido_produto WHERE cod_pedido = $cod_ped";


if ($result = mysqli_query($link, $query)) {
    echo "<h1>Itens do pedido $cod_ped</h1>";
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
        $obj->Preco = number_format(doubleval($obj->Preco),2,",",".");
        printf ('<div> <tr scope="row">
            <td>%s</td>
            <td>R$ %s</td>
            <td>%s</td>
            <td>%s</td>
            </div>', $obj->descricao, $obj->Preco, $obj->categoria, $obj->complemento);
    }
    echo '</tbody>
	    </table>
	<a href = "Pizzaria/concluirpedido.php">Concluir pedido</a>
	<a href = "Pizzaria/cancelarpedido.php">Cancelar pedido</a>';


    /* Libera o resultado */
    mysqli_free_result($result);
}

?>