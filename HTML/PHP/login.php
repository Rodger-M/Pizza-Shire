<?php
// Inicia a sessão
session_start();
 
// Conferre se o usuário já está "logado" e direciona para homepage caso esteja
if(isset($_SESSION["logado"]) && $_SESSION["logado"] === true){
    header("location: menu.php");
    exit;
}
 
// Arquivo de acesso ao BD
require_once "config.php";
 
// Define variáveis com valores iniciais em branco
$usuario = $senha = $conf_senha = $nome = $sobrenome = $cpf = $email = "";
$usuario_erro = $senha_erro = $conf_senha_erro = $nome_erro = $sobrenome_erro = $cpf_erro = $email_erro = "";
 
// Trabalha as informações ao enviar
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Verifica se foi inserido usuário
    if(empty(trim($_POST["usuario"]))){
        $usuario_erro = "Informe o usuário.";
    } else{
        $usuario = trim($_POST["usuario"]);
    }
    
    // Verifica se foi inserido a senha
    if(empty(trim($_POST["senha"]))){
        $senha_erro = "Informe sua senha.";
    } else{
        $senha = trim($_POST["senha"]);
    }
    
    // Valida o login
    if(empty($usuario_erro) && empty($senha_erro)){
        // Realiza o SELECT com os critérios
        $sql = "SELECT cod_cliente, usuario, senha FROM cliente WHERE usuario = ? AND status = 'Ativo'";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincula variaveis como parametros
            mysqli_stmt_bind_param($stmt, "s", $param_usuario);
            
            // Define parametros
            $param_usuario = $usuario;
            
            // Executa a declaração
            if(mysqli_stmt_execute($stmt)){
                // Armazena resultado
                mysqli_stmt_store_result($stmt);
                
                // Verifica se o usuário existe, se existir, procura a senha
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Vincula variáveis de resultado
                    mysqli_stmt_bind_result($stmt, $cod_cliente, $usuario, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($senha, $hashed_password)){
                            // Senha OK, inicia sessão
                            session_start();
                            
                            // Armazena dados nas variáveis de sessão
                            $_SESSION["logado"] = true;
                            $_SESSION["cod"] = $cod_cliente;
                            $_SESSION["usuario"] = $usuario;
                            
                            // Redireciona para o bem vindo
                            header("location: menu.php");
                        } else{
                            // Exibe erro se a senha estiver incorreta
                            $senha_erro = "A senha está incorreta.";
                        }
                    }
                } else{
                    // Se usuário não existir
                    $usuario_erro = "Não localizamos uma conta ativa para este usuário.";
                }
            } else{
                echo "Algo deu errado, tente novamente mais tarde!";
            }

        // Fecha a declareção
        mysqli_stmt_close($stmt);
        }
        
        // Fecha a declareção
        //mysqli_stmt_close($stmt);
    }
    
    // Fecha conexão
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($usuario_erro)) ? 'has-error' : ''; ?>">
                <label>usuario</label>
                <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>">
                <span class="help-block"><?php echo $usuario_erro; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($senha_erro)) ? 'has-error' : ''; ?>">
                <label>senha</label>
                <input type="senha" name="senha" class="form-control">
                <span class="help-block"><?php echo $senha_erro; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="registro.php">Sign up now</a>.</p>
            <p>Forgot your password? <a href="resetsenha.php">Reset it now</a>.</p>
        </form>
    </div>    
</body>
</html>