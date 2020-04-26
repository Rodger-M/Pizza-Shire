<?php
// Inicia a sessão e carrinho
session_start();
// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true){
    header("location: ../login.php");
    exit;
}

// Arquivo de configuração
require_once "config.php";

$base = $_SESSION["pizza"];

/* Cria a query ativos*/
$query = "SELECT cod_produto, descricao, ingredientes, categoria, preco, disponibilidade, imagem FROM produto WHERE categoria = 'Adicional' AND disponibilidade = 'Disponivel'";


$result = mysqli_query($link, $query);

    echo '<div id="pizzas">
            <h2>Adicionais para ' .$base. '</h2>
                <div class="container-fluid container-prod">';

// Loop para os produtos
while($row=mysqli_fetch_assoc($result)) {
$resultset[] = $row;
}
if(!empty($resultset))
$result = $resultset;
        if (!empty($result)) { 
            foreach($result as $key=>$value){
?>
    
         <div class="box-produto">
              <form method="post" action="Pizzaria/adicionaradicional.php">
             <img class="img-produto" src="Pizzaria/uploads/<?php echo $result[$key]["imagem"]; ?>" alt="Produto">
                <div>
                    <p class="title-prod"><?php echo $result[$key]["descricao"]; ?></p>
                    <p class="ingr-prod"><?php echo $result[$key]["ingredientes"]; ?></p>
                    <p class="ingr-prod">R$ <?php echo $result[$key]["preco"]; ?></p>

                    
                    <input type="hidden" name="cod_produto" value="<?php echo $result[$key]["cod_produto"]; ?>">
                    <input type="hidden" name="descricao" value="<?php echo $result[$key]["descricao"]; ?>">
                    <input type="hidden" name="preco" value="<?php echo $result[$key]["preco"]; ?>">
                    <input type="hidden" name="categoria" value="<?php echo $result[$key]["categoria"]; ?>">
                    <input type="hidden" name="complemento" value="Adicional de <?php echo $base; ?>">
                    <input type="hidden" name="base" value="<?php echo $base; ?>">
                        <button type="submit" class="btn-prod" style="border: none;">
                            <i class="fas fa-plus"></i>
                        </button>
                    </form>
                </div>

</div>
<?php
        }
    }
    
    echo '</div></div>';
?>