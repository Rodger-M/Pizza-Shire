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
        echo "<script type='text/javascript'>alert('$usuario_erro');</script>";
    } else{
        $usuario = trim($_POST["usuario"]);
    }
    // Verifica se foi inserido a senha
    if(empty(trim($_POST["senha"]))){
        $senha_erro = "Informe sua senha.";
        echo "<script type='text/javascript'>alert('$senha_erro');</script>";
    } else{
        $senha = trim($_POST["senha"]);
    }
    // Valida o login
    if(empty($usuario_erro) && empty($senha_erro)){
        // Realiza o SELECT com os critérios
        $sql = "SELECT cod_cliente, usuario, senha FROM cliente WHERE usuario = ?";
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
                            $_SESSION["id"] = $cod_cliente;
                            $_SESSION["user"] = $usuario;
                            $_SESSION["pizza"] = "Pizza"; 
                            $_SESSION["mail"] = 0;
                            $_SESSION["ped"] = 0;
                            $_SESSION["precobase"] = 0;
                            // Redireciona para o bem vindo
                            header("location: menu.php");
                        } else{
                            // Exibe erro se a senha estiver incorreta
                            $senha_erro = "A senha está incorreta.";
                            echo "<script type='text/javascript'>alert('$senha_erro');</script>";
                        }
                    }
                } else{
                    // Se usuário não existir
                    $usuario_erro = "Não localizamos uma conta para este usuário.";
                    echo "<script type='text/javascript'>alert('$usuario_erro');</script>";
                }
            } else{
                $generico_erro = "Algo deu errado, tente novamente mais tarde!";
                echo "<script type='text/javascript'>alert('$generico_erro');</script>";
            }
            // Fecha a declareção
            mysqli_stmt_close($stmt);
        }
        // Fecha a declareção
        //mysqli_stmt_close($stmt);
    }
    // Fecha conexão
    mysqli_close($link);
}?>