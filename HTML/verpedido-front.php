<?php
// Inicia a sessão e carrinho
session_start();

// Confere se o usuário esta "logado" - baseado no arquivo login.php
if(!isset($_SESSION["admlogado"]) || $_SESSION["admlogado"] !== true){
    header("location: loginadm.php");
    exit;
}
?>

<!doctype html>
<html lang="pt-BR">
    <head>
        <title>Pizza Shire - A melhor pizzaria da terra média</title>
        <link rel="stylesheet" href="css/dash.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://kit.fontawesome.com/88c737c6cd.js"></script>
        <link rel="icon" type="image/png" href="img/fake-logo.png" />
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler sideMenuToggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="img/fake-logo.png" width="32" height="auto" alt="Logo">&nbsp;Pizza Shire
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>&nbsp;<?php echo htmlspecialchars($_SESSION["usuario"]); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Pizzaria/logoutadm.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--Fim Navbar-->
        
	<?php 
	$_SESSION["ped"] = $_POST["ped"];
	$cod_ped = $_SESSION["ped"];
	include 'Pizzaria/verpedido.php';
	?>

        <div class="row">
            <div class="">

                <!--Side Menu-->
                <div class="sidemenu">
                    <ul class="navbar-nav">
                        <li class="nav-item" onclick="mudaTelaPedAberto()"><a class="nav-link"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a></li>

                              <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <i class="fas fa-pizza-slice"></i>&nbsp;&nbsp;Produtos
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="javascript:mudaTelaListProdutos()">Listar Produtos</a>
			          <a class="dropdown-item" href="javascript:mudaTelaCadProdutos()">Cadastrar Produto</a>
			        </div>
			      </li>

                        <li class="nav-item" onclick="mudaTelaUsuarios()"><a class="nav-link"><i class="fas fa-users"></i>&nbsp;&nbsp;Usuários</a></li>
                        <li class="nav-item" onclick="mudaTelaRelatorios()"><a class="nav-link"><i class="fas fa-chart-bar"></i>&nbsp;&nbsp;Relatórios</a></li>
                    </ul>
                </div>
                <!--Fim Side Menu-->
            </div>
            <div class="" style="width: calc(100% - 230px);">
                <div class="main d-flex justify-content-center">
		    <div style="display: inline-block">
                    <?php include 'php/pedidos-abertos.php'; ?>
                    <?php include 'php/table-produtos.php'; ?>
                    <?php include 'Pizzaria/upload.php'; ?>
                    </div>

                </div>
            </div>
        </div>


        <script src="js/muda-tela-produtos.js"></script>
        <!--Scripts Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>