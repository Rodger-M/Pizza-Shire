<?php
define('DB_SERVIDOR', 'localhost');
define('DB_USUARIO', 'keydev44_admpi');
define('DB_SENHA', '@zxasqw12');
define('DB_NOME', 'keydev44_pizzaria');

session_start ();
$cod_cliente = $_SESSION["id"];

/* Tentativa de conexao */
$link = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_SENHA, DB_NOME);
$query = "SELECT a.cod_pedido, d.nome, d.sobrenome , c.rua, c.numero, a.forma_pagamento, a.data, a.status
FROM pedido as a
INNER JOIN endereco as c
ON c.cod_endereco = a.cod_endereco
INNER JOIN cliente as d
ON d.cod_cliente = a.cod_cliente
WHERE d.cod_cliente = $cod_cliente ORDER BY a.cod_pedido ASC";
echo'<div id="ped-aberto">';
echo'<h1>Pedidos realizados</h1>';
	if ($result = mysqli_query($link, $query)) {
	    /* Faz o array */
	    while ($obj = mysqli_fetch_object($result)) {
	        printf ('
<form method="post" action="verpedido-front-usuario.php">
<div>
Pedido: #%s
Cliente: %s %s
Endereço: %s, %s
Pagamento: %s
Data: %s
Status: %s
<input type="hidden" name="ped" value="%s">
<button type="submit" name="redireciona" class="btn-prod" style="border: none;">
	<i class="fas fa-plus"></i>
</button>
</div>
</form>
                ', $obj->cod_pedido, $obj->nome, $obj->sobrenome, $obj->rua, $obj->numero, $obj->forma_pagamento, $obj->data, $obj->status, $obj->cod_pedido);
	    }
echo'</div>';




    /* Libera o resultado */
    mysqli_free_result($result);
}

/* Fecha conexão (não utilizado por dar erro ao excluir) */
#mysqli_close($link);
?>