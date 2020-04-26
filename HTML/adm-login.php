<?php include 'loginadm.php';?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <title>Pizza Shire - A melhor pizzaria da terra média</title>
        <link rel="stylesheet" href="css/adm-styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://kit.fontawesome.com/88c737c6cd.js"></script>
        <link rel="icon" type="image/png" href="img/fake-logo.png" />
    </head>
    <body>
        <div class="bg">
            <div class="btn-brand">
                <a href="index.html"><img style="width: 32px; height: auto; padding-bottom: 8px;" src="img/fake-logo.png" alt="Início"></a>
                <a class="brand-link" href="index.php">Início</a>
            </div>
            <div class="alternativo">
                <!--Login-->
                <div id="login" class="login-box">
                    <h1>Entrar</h1>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="text-box form-group <?php echo (!empty($usuario_erro)) ? 'has-error' : ''; ?>">
                            <i class="fas fa-user-circle" aria-hidden="true"></i>
                            <input type="text" placeholder="Usuário" name="usuario" value="">
                        </div>
                        <div class="text-box form-group <?php echo (!empty($senha_erro)) ? 'has-error' : ''; ?>">
                            <i class="fas fa-unlock" aria-hidden="true"></i>
                            <input type="password" placeholder="Senha" name="senha" value="">
                        </div>
                        <div class="form-group">
                            <input class="btn-login" type="submit" name="Entrar" value="Entrar">
                            <p><a href="recuperar.html">Esqueceu a senha?</a></p>
                        </div>
                    </form>

                </div>
                <!--Fim Login-->
            </div>
        </div>
    </body>
</html>