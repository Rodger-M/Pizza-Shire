<?php
/* Crendenciais do DB */
define('DB_SERVIDOR', 'localhost');
define('DB_USUARIO', 'keydev44_admpi');
define('DB_SENHA', '@zxasqw12');
define('DB_NOME', 'keydev44_pizzaria');

/* Tentativa de conexao */
$link = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_SENHA, DB_NOME);

/* Conferindo a conexao */
if($link === false){
    die("ERRO: Não foi possível conectar. " . mysqli_connect_error());
}
?>