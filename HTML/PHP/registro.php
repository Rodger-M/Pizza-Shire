<?php
// Incluindo o arquivo config
require_once "config.php";
 
// Definindo as variaveis e iniciando vazias
$usuario = $senha = $conf_senha = $nome = $sobrenome = $cpf = $email = "";
$usuario_erro = $senha_erro = $conf_senha_erro = $nome_erro = $sobrenome_erro = $cpf_erro = $email_erro = "";
 
// Processando dados inseridos no cadastro
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar usuario (tirar espaço no inicio de final da string e ver se tem dados)
    if(empty(trim($_POST["usuario"]))){
        $usuario_erro = "Informe o usuário.";
    } else{
        // Preparando o SELECT no BD
        $sql = "SELECT cod_cliente FROM cliente WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vinculando variaveis como parametros
            mysqli_stmt_bind_param($stmt, "s", $param_usuario);
            
            // Definindo parametros
            $param_usuario = trim($_POST["usuario"]);
            
            // Tentando executar
            if(mysqli_stmt_execute($stmt)){
                // Armazenando o resultado
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $usuario_erro = "Usuário já existe.";
                } else{
                    $usuario = trim($_POST["usuario"]);
                }
            } else{
                echo "Algo deu errado, tente novamente mais tarde.";
            }
       	// Finalizando
        mysqli_stmt_close($stmt);
        }
         
        // Finalizando
        //mysqli_stmt_close($stmt);
    }
    
    // Validando a senha
    if(empty(trim($_POST["senha"]))){
        $senha_erro = "Insira a senha.";     
    } elseif(strlen(trim($_POST["senha"])) < 8){
        $senha_erro = "A senha deve ter no minimo 8 caracteres.";
    } else{
        $senha = trim($_POST["senha"]);
    }
    
    // Confirmando a senha
    if(empty(trim($_POST["conf_senha"]))){
        $conf_senha_erro = "Por favor, confirme a senha.";     
    } else{
        $conf_senha = trim($_POST["conf_senha"]);
        if(empty($senha_erro) && ($senha != $conf_senha)){
            $conf_senha_erro = "As senhas estão diferentes!";
        }
    }
    
    // Validando o nome
    if(empty(trim($_POST["nome"]))){
        $nome_erro = "Insira o nome.";     
    } else{
        $nome = trim($_POST["nome"]);
    }

    // Validando o sobrenome
    if(empty(trim($_POST["sobrenome"]))){
        $sobrenome_erro = "Insira o sobrenome.";     
    } else{
        $sobrenome = trim($_POST["sobrenome"]);
    }
    

    // Validando o cpf
    if(empty(trim($_POST["cpf"]))){
        $cpf_erro = "Insira o cpf.";     
    } else{
        $cpf = trim($_POST["cpf"]);
    }
    

    // Validando o email
    if(empty(trim($_POST["email"]))){
        $email_erro = "Insira o email.";     
    } else{
        $email = trim($_POST["email"]);
    }
    
    

    // Conferindo erros antes de inserir na BD
    if(empty($nome_erro) && empty($sobrenome_erro) && empty($cpf_erro) && empty($email_erro) && empty($usuario_erro) && empty($senha_erro) && empty($conf_senha_erro)){
        
        // Preparando o INSERT para o BD - Acrescentar demais campos do cadastro
        $sql = "INSERT INTO cliente (nome, sobrenome, cpf, email, usuario, senha) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Vinculando vareaveis como parametros
            mysqli_stmt_bind_param($stmt, "ssssss", $param_nome, $param_sobrenome, $param_cpf, $param_email, $param_usuario, $param_senha);
            
            // Definindo parametros
            $param_nome = $nome;
            $param_sobrenome = $sobrenome;
            $param_cpf = $cpf;
            $param_email = $email;
            $param_usuario = $usuario;
            $param_senha = password_hash($senha, PASSWORD_DEFAULT); // Cria a senha hash
            
            // Executando
            if(mysqli_stmt_execute($stmt)){
                // Redireciona para o login
                header("location: login.php");
            } else{
                echo "Algo deu errado, tente novamente mais tarde!";
            }
        // Fechando declaração
        mysqli_stmt_close($stmt);
        }
         
        // Fechando declaração
        //mysqli_stmt_close($stmt);
    }
    
    // Fechando conexão
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($nome_erro)) ? 'has-error' : ''; ?>">
                <label>nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                <span class="help-block"><?php echo $nome_erro; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($sobrenome_erro)) ? 'has-error' : ''; ?>">
                <label>sobrenome</label>
                <input type="text" name="sobrenome" class="form-control" value="<?php echo $sobrenome; ?>">
                <span class="help-block"><?php echo $sobrenome_erro; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($cpf_erro)) ? 'has-error' : ''; ?>">
                <label>cpf</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $cpf; ?>">
                <span class="help-block"><?php echo $cpf_erro; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($email_erro)) ? 'has-error' : ''; ?>">
                <label>email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_erro; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($usuario_erro)) ? 'has-error' : ''; ?>">
                <label>usuario</label>
                <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>">
                <span class="help-block"><?php echo $usuario_erro; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($senha_erro)) ? 'has-error' : ''; ?>">
                <label>senha</label>
                <input type="senha" name="senha" class="form-control" value="<?php echo $senha; ?>">
                <span class="help-block"><?php echo $senha_erro; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($conf_senha_erro)) ? 'has-error' : ''; ?>">
                <label>Confirm senha</label>
                <input type="senha" name="conf_senha" class="form-control" value="<?php echo $conf_senha; ?>">
                <span class="help-block"><?php echo $conf_senha_erro; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <input type="reset" class="btn btn-default" value="Redefinir">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>