<!doctype html>
<html lang="pt-BR">
    <head>
        <title>Pizza Shire - A melhor pizzaria da terra média</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://kit.fontawesome.com/88c737c6cd.js"></script>
        <link rel="icon" type="image/png" href="img/fake-logo.png" />
    </head>

    <body>
        <!--Voltar ao Topo-->
        <button onclick="topFunction()" id="voltarTopo" title="Voltar ao início" style="width: 3em; height: 3em;">
            <span class="fas fa-angle-up fa-2x"></span>
        </button>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top navbar-scroll">
            <a class="navbar-brand" href="#">
                <img src="img/fake-logo.png" width="32" height="auto" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#principal">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#delivery">Delivery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre Nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#rodape">Contato</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cardápio
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="menu.php#pizzas">Pizzas</a>
                            <a class="dropdown-item" href="menu.php#bebidas">Bebidas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="menu.php#sobremesas">Sobremesas</a>
                        </div>
                    </li>
                </ul>

                <div class="login-box">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="carrinho-teste.php"><i class="fas fa-shopping-cart fa-lg"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-user-circle fa-lg" style="font-size: 24px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
                                <a class="dropdown-item" href="login.php">Entrar</a>
                                <a class="dropdown-item" href="logout.php">Sair</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="adm-login.php">Gerenciar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Fim Navbar-->
        
        <?php include 'php/mailalert.php';?>

        <!--Principal-->
        <div id="principal" class="bg-principal">
            <h1 class="white-color">A MELHOR PIZZA DO CONDADO</h1><br>
            <p class="white-color"><i>Sinta o sabor do forno a lenha no estilo mais tradicional.</i></p>
            <div class="row bounce">
                <a class="rotate90 mx-auto" href="#delivery">
                    <img class="fluid-img arrowkey" src="img/arrow.svg" alt="Seta">
                </a>
            </div>
        </div>
        <!--Fim Principal-->

        <!--Delivery-->
        <div id="delivery">
            <h1 class="title-delivery">FAÇA SEU PEDIDO!</h1>
            <p>Fazer um pedido nunca foi tão fácil e rápido! Você pode fazer<br>o pedido pelo site ou baixar nosso <span style="color: red; font-weight: 600;">App</span> na App Store ou Google Play.</p>
            <div id="img-app" class="d-flex justify-content-center" style="margin-top: 20px;">
                <img class="img-fluid telas" src="img/tela1.jpg">
                <img class="img-fluid telas" src="img/tela2.jpg">
                <img class="img-fluid telas" src="img/tela3.jpg">
            </div>
            <div class="d-flex justify-content-center" style="margin-top: 20px;">
                <a href="#">
                    <img class="img-fluid appstore" src="img/google-play.png"/>
                </a>
                <a href="#">
                    <img class="img-fluid appstore" src="img/app-store.png"/>
                </a>
            </div>
        </div>
        <!--Fim Delivery-->

        <!--Sobre Nós-->
        <div id="sobre" class="bg-sobre">
            <br>
            <!--Montar uma seção de comentários/depoimentos-->
            <div class="row">
                <h1 class="white-color">SOBRE NÓS</h1>
            </div>
            <br>
            <div class="row" style="max-width: 80%;">
                <i>
                    <p class="text-centro white-color">Aprendemos a fazer pizza com nossos antepassados napolitanos. O preparo é inteiramente artesanal. A massa é trabalhada com as mãos e descansa por no mínimo 48 horas antes de ser aberta. A pizza é degustada macia, bem assada e suave.</p>
                    <p class="text-centro white-color">As bordas elevadas são douradas e trazem um delicioso aroma. Na hora de recheá-la, além do vínculo com nossas tradições também buscamos referências contemporâneas, interpretando culturas, harmonizando ingredientes e criando novas experiências gastronômicas.</p>
                </i>
            </div>
            <div class="row social-section">
                <p class="white-color" style="font-weight: 600;">Confira Nossas Redes Sociais</p>
            </div>
            <div class="row social-div">
                <a href=""><span class="fab fa-facebook fa-lg white-color"></span></a>
                <a href=""><span class="fab fa-instagram fa-lg white-color"></span></a>
                <a href=""><span class="fab fa-twitter fa-lg white-color"></span></a>
            </div>
        </div>
        <!--Fim Sobre Nós-->

        <!--Rodapé-->
        <div id="rodape">
            <div class="row">
                <div class="col-md-3 rodape-social">
                    <div class="row">
                        <a><img src="img/fake-logo.png" alt="Logo" style="max-width: 64px; height: auto" /></a>
                    </div>
                    <div class="row social-div">
                        <a href=""><span class="fab fa-facebook fa-lg" style="color: black;"></span></a>
                        <a href=""><span class="fab fa-instagram fa-lg" style="color: black;"></span></a>
                        <a href=""><span class="fab fa-twitter fa-lg" style="color: black;"></span></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <strong>
                        <p>Horário de Funcionamento</p>
                    </strong>
                    <p>Todos os dias<br>18h00 às 00h00</p>
                    <strong>
                        <p>Pagamento</p>
                    </strong>
                    <p>Aceitamos todos os cartões de débito, crédito e vales refeição.</p>
                    <strong>
                        <p>Telefone</p>
                    </strong>
                    <p>(11) &nbsp;&nbsp;2731-8574<br>(11) 94912-3558</p>
                </div>
                <div class="col-md-5">
                    <h4>Mande uma mensagem</h4>
                    <form action="php/mail.php" method="POST" style="height: 80%;">
                        <input class="insert-msg" type="email" name="email" placeholder="E-mail">
                        <br>
                        <select id="assunto-msg" name="tipomsg" class="insert-msg">
                            <option value="">Assunto da Mensagem</option>
                            <option value="elogio">Elogio</option>
                            <option value="sugestao">Sugestão</option>
                            <option value="reclamacao">Reclamação</option>
                        </select>
                        <br>
                        <textarea class="insert-msg caixa-texto" name="mensagem" placeholder="Digite sua mensagem aqui..."></textarea>
                        <input class="btn-enviar" type="submit" name="enviar" value="Enviar">
                        <input class="btn-enviar" type="reset" name="limpar" value="Limpar">
                    </form>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <p class="copyright">&copy;Pizza Shire. Todos os direitos reservados. Feito com <i class="fas fa-heart" style="color: red;"></i> por KeyDev.</p>
            </div>
        </div>
        <!--Fim Rodapé-->

        <!--Scripts Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!--Script Navbar Color-->
        <script src="js/nav-scroll.js" type="text/javascript"></script>
        <!--Top Button-->
        <script src="js/back-top.js" type="text/javascript"></script>
        <!--Slides-->
        <script src="js/slides.js" type="text/javascript"></script>
    </body>
</html>