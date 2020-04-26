<?php
// Inicia a sessão e carrinho
session_start();
 
// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true){
    header("location: login.php");
    exit;
}

// Arquivo de configuração
require_once "config.php";

/* Cria a query ativos*/
$query = "SELECT cod_produto, descricao, categoria, preco, disponibilidade, imagem FROM Produto WHERE disponibilidade = 'Disponivel' ORDER BY categoria DESC";


	$result = mysqli_query($link, $query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			$result = $resultset;
        if (!empty($result)) { 
            foreach($result as $key=>$value){
?>
    <p><a href="carrinho.php" class="btn btn-warning">Go to cart!</a></p>
	<div class="product-item">
		<form method="post" action="adicionaraopedido.php">
        <input type="hidden" name="cod_produto" value="<?php echo $result[$key]["cod_produto"]; ?>">
		<div class="produto-imagem"><img src="uploads/<?php echo $result[$key]["imagem"]; ?>"></div>
		<div class="produto-texto">
		<div class="produto-descricao"><?php echo $result[$key]["descricao"]; ?></div>
            <input type="hidden" name="descricao" value="<?php echo $result[$key]["descricao"]; ?>">
        <div class="produto-categoria"><?php echo $result[$key]["categoria"]; ?></div>
            <input type="hidden" name="categoria" value="<?php echo $result[$key]["categoria"]; ?>">
		<div class="produto-preco"><?php echo "R$".$result[$key]["preco"]; ?></div>
            <input type="hidden" name="preco" value="<?php echo $result[$key]["preco"]; ?>">
            <div class="produto-complemento">
            <?php
            $categoria = $result[$key]["categoria"];

            switch ($categoria) {
                case "Pizza":
                    echo "<select name='complemento'><option value='Inteira'>Inteira</option><option value='Metade'>Metade</option></select>";
                    break;
                case "Borda":
                    echo "<select name='complemento'><option value='Borda'>Borda</option></select>";
                    break;
                case "Adicional":
                    echo "<select name='complemento'><option value='Adicional'>Adicional</option></select>";
                    break;
                default:
                    echo "Your favorite color is neither red, blue, nor green!";
            }
            ?>
            </div>
		<div class="carrinho-acao"><input type="text" class="produto-quantidade" name="quantidade" value="1" size="2" /><input type="submit" value="Adicionar ao pedido" class="btnAdd" /></div>
		</div>
		</form>
	</div>
<?php
        }
    /* Libera o resultado */
    #mysqli_free_result($result);
    }

/* Fecha conexão (não utilizado por dar erro ao excluir) */
#mysqli_close($link);
?>
