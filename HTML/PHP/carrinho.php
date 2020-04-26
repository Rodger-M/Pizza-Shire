<?php
// Inicia a sessão
session_start();

// Arquivo de configuração
require_once "config.php";

// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] != true){
    header("location: ../login.php");
    exit;
}

$cliente = $_SESSION["id"];

/* Cria a query ativos*/
$query = "SELECT cod_produto, descricao, Quantidade, Preco, categoria, complemento, cod_carrinho FROM carrinho WHERE cod_usuario = $cliente";


if ($result = mysqli_query($link, $query)) {
    echo '<h1>Carrinho</h1>';
    echo '<table class="table table-hover table-responsive" style="text-align: center;">
			<thead class="thead-dark">
                            <tr>
		            <th scope="col">Produto</th>
		            <th scope="col">Preço</th>
		            <th scope="col">Categoria</th>
		            <th scope="col">Complemento</th>
		            <th scope="col">Ações</th>
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
            <form method="post" action="Pizzaria/excluidopedido.php">
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



/* Cria a query ativos*/
$query = "SELECT rua, numero, cidade, cep, cod_endereco FROM endereco WHERE cod_cliente = $cliente AND status = 'Ativo'";


if ($result = mysqli_query($link, $query)) {
    echo '<form method="post" action="Pizzaria/finalizar.php">';
    echo '<h1>Forma de pagamento</h1>';
    echo '<select name="Pagamento">
                <option value="Dinheiro">Dinheiro</option>
                <option value="Débito">Débito</option>
                <option value="Crédito">Crédito</option>
                <option value="Vale-Refeição">Vale-Refeição</option>
            </select>';



    echo '<h1>Endereço</h1>';

    echo '<table class="table table-hover table-responsive" style="text-align: center;">
			<thead class="thead-dark">
                        <tr>
		            <th scope="col">Selecione</th>                        
		            <th scope="col">Rua</th>
		            <th scope="col">Número</th>
		            <th scope="col">Cidade</th>
		            <th scope="col">CEP</th>
                        </tr>
			</thead>

			<tbody>';

    /* Faz o array */
    while ($obj = mysqli_fetch_object($result)) {
        printf ('<div><tr scope="row">
            <td>
		  <input type="radio" name="criar" value="%s">
		  <span class="checkmark"></span>
            </td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
	    </div>', $obj->cod_endereco, $obj->rua, $obj->numero, $obj->cidade, $obj->cep);
    }

    echo '</tbody>
	</table>';
    echo '<input type="submit" name="cri" value="Finalizar!">';
    echo '</form>';

    /* Libera o resultado */
    mysqli_free_result($result);
}

?>