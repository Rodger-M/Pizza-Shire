<?php
// Inicia a sessão
session_start();

// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] != true){
    header("location: ../login.php");
    exit;
}
 
// Arquivo de configuração
require_once "config.php";

// Definindo as variaveis e iniciando vazias
$uf = $cidade = $cep = $rua = $numero = "";
$uf_erro = $cidade_erro = $cep_erro = $rua_erro = $numero_erro = "";
 
// Processando dados inseridos no cadastro
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validando a UF
    if(empty(trim($_POST["uf"]))){
        $uf_erro = "Insira a UF.";     
    } else{
        $uf = trim($_POST["uf"]);
    }

    // Validando a cidade
    if(empty(trim($_POST["cidade"]))){
        $cidade_erro = "Insira a cidade.";     
    } else{
        $cidade = trim($_POST["cidade"]);
    }
    

    // Validando o CEP
    if(empty(trim($_POST["cep"]))){
        $cep_erro = "Insira o cep.";     
    } else{
        $cep = trim($_POST["cep"]);
    }
    

    // Validando a rua
    if(empty(trim($_POST["rua"]))){
        $rua_erro = "Insira a rua.";     
    } else{
        $rua = trim($_POST["rua"]);
    }
    
    // Validando o numero
    if(empty(trim($_POST["numero"]))){
        $numero_erro = "Insira o numero.";     
    } else{
        $numero = trim($_POST["numero"]);
    }

    // Conferindo erros antes de inserir na BD
    if(empty($uf_erro) && empty($cidade_erro) && empty($cep_erro) && empty($rua_erro) && empty($numero_erro)){
        
        // Preparando o INSERT para o BD - Acrescentar demais campos do cadastro
        $sql = "INSERT INTO endereco (uf, cidade, cep, rua, numero, cod_cliente) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Vinculando vareaveis como parametros
            mysqli_stmt_bind_param($stmt, "ssssss", $param_uf, $param_cidade, $param_cep, $param_rua, $param_numero, $param_cod_cliente);
            
            // Definindo parametros
            $param_uf = $uf;
            $param_cidade = $cidade;
            $param_cep = $cep;
            $param_rua = $rua;
            $param_numero = $numero;
            $param_cod_cliente = $_SESSION["id"];//Pega código de usuário da sessão
            
            // Executando
            if(mysqli_stmt_execute($stmt)){
                // Redireciona para os endereços
                header("location: ../enderecos-front.php");
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

    <div class="wrapper" style="padding: 4em 1em 1em 1em;">
        <h2>Cadastro de endereço</h2>
        <p>Por favor, preencha os campos abaixo:</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($uf_erro)) ? 'has-error' : ''; ?>">
                <label>UF</label>
                <!-- Da pra fazer um combo box aqui -->
                <input type="text" name="uf" class="form-control" value="<?php echo $uf; ?>">
                <span class="help-block"><?php echo $uf_erro; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($cidade_erro)) ? 'has-error' : ''; ?>">
                <label>Cidade</label>
                <input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>">
                <span class="help-block"><?php echo $cidade_erro; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($cep_erro)) ? 'has-error' : ''; ?>">
                <label>CEP</label>
                <input type="text" name="cep" class="form-control" value="<?php echo $cep; ?>">
                <span class="help-block"><?php echo $cep_erro; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($rua_erro)) ? 'has-error' : ''; ?>">
                <label>Rua</label>
                <input type="text" name="rua" class="form-control" value="<?php echo $rua; ?>">
                <span class="help-block"><?php echo $rua_erro; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($numero_erro)) ? 'has-error' : ''; ?>">
                <label>Número</label>
                <input type="text" name="numero" class="form-control" value="<?php echo $numero; ?>">
                <span class="help-block"><?php echo $numero_erro; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <input type="reset" class="btn btn-default" value="Redefinir">
            </div>
            <p>Estes endereços estão corretos? <a href="menu.php">Voltar!</a></p>
        </form>
    </div>    