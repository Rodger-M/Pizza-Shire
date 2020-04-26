<?php include 'php/user.php';?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <title>Pizza Shire - A melhor pizzaria da terra média</title>
        <link rel="stylesheet" href="css/login-styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://kit.fontawesome.com/88c737c6cd.js"></script>
        <link rel="icon" type="image/png" href="img/fake-logo.png" />
        <!--Top Button-->
        <script src="js/muda-tela.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="bg-login">
            <div class="btn-brand">
                <a href="index.html"><img style="width: 32px; height: auto; padding-bottom: 8px;" src="img/fake-logo.png" alt="Início"></a>
                <a class="brand-link" href="index.php">Início</a>
            </div>
            <!--Login-->
            <div id="login" class="login-box">
                <h1>Entrar</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="text-box form-group <?php echo (!empty($usuario_erro)) ? 'has-error' : ''; ?>">
                        <i class="fas fa-user-circle" aria-hidden="true"></i>
                        <input type="text" name="usuario" placeholder="Usuário">
                    </div>    
                    <div class="text-box form-group <?php echo (!empty($senha_erro)) ? 'has-error' : ''; ?>">
                        <i class="fas fa-unlock" aria-hidden="true"></i>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn-login" value="Entrar" name="entrar">
                    </div>
                    <p onclick="mudaTela()">Não tem uma conta? <a href="#">Crie uma!</a></p>                    
                </form>
            </div>
            <!--Fim Login-->
            <!--Cadastro-->
            <div id="registro" class="registro-box">
                <div class="row">
                    <h1>Cadastrar</h1>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="text-box">
                                <i class="fas fa-smile"></i>
                                <input type="text" placeholder="Nome" name="nome" value="">
                            </div>
                            <div class="text-box">
                                <i class="fas fa-smile"></i>
                                <input type="text" placeholder="Sobrenome" name="sobrenome" value="">
                            </div>
                            <div class="text-box" style="overflow: hidden;">
                                <i class="fas fa-id-card" aria-hidden="true"></i>
                                <input type="number" placeholder="CPF" name="cpf" value="">
                            </div>
                            <div class="text-box">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <input type="email" placeholder="Email" name="email" value="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-box">
                                <i class="fas fa-user-circle" aria-hidden="true"></i>
                                <input type="text" placeholder="Usuário" name="usuario" value="">
                            </div>
                            <div class="text-box">
                                <i class="fas fa-unlock" aria-hidden="true"></i>
                                <input type="password" placeholder="Senha" name="senha" value="">
                            </div>
                            <div class="text-box">
                                <i class="fas fa-unlock" aria-hidden="true"></i>
                                <input type="password" placeholder="Confirmar a Senha" name="conf_senha" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input class="btn-login" type="submit" name="cadastrar" value="Cadastrar">
                    </div>
                    <p onclick="mudaTela()">Você já tem uma conta? <a href="#">Entre aqui</a>.</p>
                </form>
            </div>
            <!--Fim Cadastro-->
            <!--Rodape            
            <div id="rodape">
                <p style="margin: 0 !important;">&copy;Pizza Shire. Todos os direitos reservados. Feito com <i class="fas fa-heart" style="color: red;"></i> por KeyDev.</p>
            </div>
            Fim Rodapé-->
        </div>
        <!--Scripts Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>