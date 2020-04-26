<?php
// Inicia a sessão

// Confere se o usuário está logado e encaminha para a tela de login caso não esteja
if(!isset($_SESSION["admlogado"]) || $_SESSION["admlogado"] !== true){
    header("location: dashboard.php");
    exit;
}

// Arquivo de configuração
require_once "config.php";


$imagem = $descricao = $categoria = $preco = $ingredientes = "";
$imagem_erro = $descricao_erro = $categoria_erro = $preco_erro = $ingredientes_erro = "";

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

// Processando dados inseridos no cadastro
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nomeimagem = basename( $_FILES["imagem"]["name"]);
    $target_dir = "Pizzaria/uploads/";
    $target_file = $target_dir . basename( $_FILES["imagem"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Confere se a imagem é válida
    /*if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Arquivo não é imagem.";
            $uploadOk = 0;
        }
    }
    // Confere se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Arquivo já existe.";
        $uploadOk = 0;
    }
    // Confere tamnaho do arquivo
    if ($_FILES["imagem"]["size"] > 5*GB) {
        echo "Arquivo grande demais.";
        $uploadOk = 0;
    }
    // Confere e permite extensões específicas
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Formato inválido.";
        $uploadOk = 0;
    }*/
    // Confere se foi gerado algum erro no processo
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi inserido.";
        // Se tudo estiver certo, realiza o upload
    } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            #echo "The file ". basename( $_FILES["imagem"]["name"]). " has been uploaded.";
        } 
    }


    // Processando dados inseridos no cadastro
    /*if($_SERVER["REQUEST_METHOD"] == "POST"){*/

    // Validando a UF
    if(empty(trim($_POST["descricao"]))){
        $descricao_erro = "Insira o pedido.";     
    } else{
        $descricao = trim($_POST["descricao"]);
        $descricao = $descricao;
    }

    // Validando a cidade
    if(empty(trim($_POST["categoria"]))){
        $categoria_erro = "Insira a cidade.";     
    } else{
        $categoria = trim($_POST["categoria"]);
        $categoria = $categoria;
    }

    // Validando a cidade
    if(empty(trim($_POST["ingredientes"]))){
        $ingredientes_erro = "Insira os ingredientes.";     
    } else{
        $ingredientes = trim($_POST["ingredientes"]);
        $ingredientes = $ingredientes;
    }

    // Validando o CEP
    if(empty(trim($_POST["preco"]))){
        $preco_erro = "Insira o preco.";     
    } else{
        $preco = trim($_POST["preco"]);
    }


    // Conferindo erros antes de inserir na BD
    if(empty($descricao_erro) && empty($categoria_erro) && empty($preco_erro)){

        // Preparando o INSERT para o BD - Acrescentar demais campos do cadastro
        $sql = "INSERT INTO produto (descricao, ingredientes, categoria, preco, imagem) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Vinculando vareaveis como parametros
            mysqli_stmt_bind_param($stmt, "sssss", $param_descricao, $param_ingredientes, $param_categoria, $param_preco, $param_imagem);

            // Definindo parametros
            $param_descricao = $descricao;
            $param_categoria = $categoria;
            $param_preco = $preco;
            $param_imagem = $nomeimagem;
            $param_ingredientes = $ingredientes;

            // Executando
            if(mysqli_stmt_execute($stmt)){
                // Redireciona para os endereços
                //header("location: produtos.php");
            } else{
                echo "Algo deu errado, tente novamente mais tarde!";
            }
            // Fechando declaração
            mysqli_stmt_close($stmt);
        }
    }

    // Fechando conexão
    mysqli_close($link);
}
?>

<div class="wrapper" id="cad-produtos" style="display: none;">
    <h2>Cadastro de Produtos</h2>
    <p>Por favor preencha o formulário para cadastrar um produto.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group <?php echo (!empty($descricao_erro)) ? 'has-error' : ''; ?>">
            <label>Nome</label>
            <input type="text" name="descricao" class="form-control" value="<?php echo $descricao; ?>">
            <span class="help-block"><?php echo $descricao_erro; ?></span>
        </div> 
        <div class="form-group <?php echo (!empty($categoria_erro)) ? 'has-error' : ''; ?>">
            <label>Categoria</label>
            <select id="assunto-msg" name="categoria" class="form-control">
                <option value="Pizza">Pizza</option>
                <option value="Bebida">Bebida</option>
                <option value="Sobremesa">Sobremesa</option>
                <option value="Borda">Borda</option>
                <option value="Adicional">Adicional</option>
            </select>
            <span class="help-block"><?php echo $categoria_erro; ?></span>
        </div> 
        <div class="form-group <?php echo (!empty($ingredientes_erro)) ? 'has-error' : ''; ?>">
            <label>Descrição</label>
            <input type="text" name="ingredientes" class="form-control" value="<?php echo $ingredientes; ?>">
            <span class="help-block"><?php echo $ingredientes_erro; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($preco_erro)) ? 'has-error' : ''; ?>">
            <label>Preço</label>
            <input type="text" name="preco" class="form-control" value="<?php echo $preco; ?>">
            <span class="help-block"><?php echo $preco_erro; ?></span>
        </div>
        <!-- achar jeito de pegar nome do anexo -->
        <div class="form-group <?php echo (!empty($imagem_erro)) ? 'has-error' : ''; ?>">
            <label>Imagem</label>
            <input type="file" name="imagem" class="form-control" value="<?php echo $imagem; ?>">
            <span class="help-block"><?php echo $imagem_erro; ?></span>
        </div>
        <!-- Botões de submit, return e redef -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Enviar">
            <button type="reset" value="Redefinir" class="btn btn-default">Redefinir</button>
        </div>
    </form>
</div>