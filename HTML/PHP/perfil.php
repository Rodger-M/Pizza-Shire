<?php
// Inicia a sessão
session_start();
 
// Confere se o usuário está logado e encaminha para a tela de login caso não esteja
/*if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true){
    header("location: login.php");
    exit;
}*/

// Arquivo de configuração
require_once "config.php";

$cliente = $_SESSION["id"];

/* Cria a query com dados do cliente */
$querycliente = "SELECT nome, sobrenome, usuario, email FROM cliente WHERE cod_cliente = $cliente";

	if ($result = mysqli_query($link, $querycliente)) {
		
	    /* Faz o array */
	    while ($obj = mysqli_fetch_object($result)) {
	        printf ('
                    <h2>Perfil</h2>
                    <div>
                        <h5>Nome</h5>
                        %s %s
                        <h5>Usuário</h5>
                        %s
                        <h5>E-mail</h5>
                        %s               
                    </div>

                ', $obj->nome, $obj->sobrenome, $obj->usuario, $obj->email);
	    }
    /* Libera o resultado */
    mysqli_free_result($result);
}	    

/* Cria a query */
$query = "SELECT rua, numero, cep, cod_endereco FROM endereco WHERE cod_cliente = $cliente AND status='Ativo'";


	if ($result = mysqli_query($link, $query)) {
		echo '<h5>Endereço</h5>
		<form method="post" action="excluiendereco.php">';

	    /* Faz o array */
	    while ($obj = mysqli_fetch_object($result)) {
	        printf ('<div>%s, %s, %s <input type="hidden" name="exclui" value="%s"><input type="image" src="https://icons-for-free.com/iconfiles/png/512/trash+bin+icon-1320086460670911435.png" height = 16px width = 16px></div>', $obj->rua, $obj->numero, $obj->cep, $obj->cod_endereco);
	    }
	    echo '</form>';



    /* Libera o resultado */
    mysqli_free_result($result);
}

/* Fecha conexão (não utilizado por dar erro ao excluir) */
#mysqli_close($link);
?>