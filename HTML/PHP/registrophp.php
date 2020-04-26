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
        echo "<script type='text/javascript'>alert('$usuario_erro');</script>";
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
                    echo "<script type='text/javascript'>alert('$usuario_erro');</script>";
                } else{
                    $usuario = trim($_POST["usuario"]);
                }
            } else{
                $generico_erro = "Algo deu errado, tente novamente mais tarde.";
                echo "<script type='text/javascript'>alert('$generico_erro');</script>";
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
        echo "<script type='text/javascript'>alert('$senha_erro');</script>";
    } else{
        $senha = trim($_POST["senha"]);
    }
    // Confirmando a senha
    if(empty(trim($_POST["conf_senha"]))){
        $conf_senha_erro = "Por favor, confirme a senha.";
        echo "<script type='text/javascript'>alert('$conf_senha_erro');</script>";
    } else{
        $conf_senha = trim($_POST["conf_senha"]);
        if(empty($senha_erro) && ($senha != $conf_senha)){
            $conf_senha_erro = "As senhas estão divergentes!";
            echo "<script type='text/javascript'>alert('$conf_senha_erro');</script>";
        }
    }
    // Validando o nome
    if(empty(trim($_POST["nome"]))){
        $nome_erro = "Insira o nome.";
        echo "<script type='text/javascript'>alert('$nome_erro');</script>";
    } else{
        $nome = trim($_POST["nome"]);
    }
    // Validando o sobrenome
    if(empty(trim($_POST["sobrenome"]))){
        $sobrenome_erro = "Insira o sobrenome.";
        echo "<script type='text/javascript'>alert('$sobrenome_erro');</script>";
    } else{
        $sobrenome = trim($_POST["sobrenome"]);
    }
    // Validando o cpf
    if(empty(trim($_POST["cpf"]))){
        $cpf_erro = "Insira o cpf.";
        echo "<script type='text/javascript'>alert('$cpf_erro');</script>";
    } else{
        $cpf = trim($_POST["cpf"]);
    }
    // Validando o email
    if(empty(trim($_POST["email"]))){
        $email_erro = "Insira o email.";
        echo "<script type='text/javascript'>alert('$email_erro');</script>";
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
                $sucesso = "Conta criada com sucesso!";
                //Alerta de sucesso
                echo "<script type='text/javascript'>alert('$sucesso');</script>";
                // Redireciona para o login
                header("location: login.php");
            }else{
                $generico_erro = "Algo deu errado!";
                echo "<script type='text/javascript'>alert('$generico_erro');</script>";
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