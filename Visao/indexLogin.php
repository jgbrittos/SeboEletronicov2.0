<?php
session_start();
if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: entrarLogin.php");
    exit;
}
?>
    <html>
        <head>	
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" href="Css/bootstrap.3.0.3/bootstrap.css"/>
            <link rel="stylesheet" href="Css/todc-bootstrap.3/todcBootstrap.3.css"/>
            <link rel="stylesheet" href="Css/estilo.css"/>
            <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 

            <title>Sebo Eletrônico</title>
        </head>
        
        <body>            
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#" onclick="home();">
                                    Home
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="#" onclick="user();">
                                    Usuário
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="#" onclick="livro();">
                                    Livro
                                </a>
                            </li>
                        </ul>
                        <div class="pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="../index.php">Sair</a></li>
                                <!--<a class="navbar-brand"><img src="http://localhost/SeboEletronicov2.0/Visao/img/sebo_header.png"/></a>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div align="center">
                <font size="+3">Seja Bem Vindo ao Sebo Eletrônico!</font><br /><br /><br />
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus pharetra justo et varius. Integer molestie massa nunc, 
                aliquet rhoncus orci gravida in. Praesent a nulla sem. Sed fermentum dui eget risus adipiscing dapibus. Quisque a orci risus. 
                Proin ultrices mauris quam, non lacinia metus feugiat eget. Proin sodales sagittis tristique. Sed commodo sem sit amet odio 
                porttitor egestas. Aliquam erat volutpat. Nullam mollis a mi a sollicitudin. Suspendisse elit augue, pharetra sit amet orci non, 
                imperdiet luctus urna. Cras a elementum dolor. Donec in ante sapien.
                </div><br /><br /><br />
                <img src="http://localhost/SeboEletronicov2.0/Visao/img/Login.png" class="img3"/>
            </div>
        </body>
        
    </html>