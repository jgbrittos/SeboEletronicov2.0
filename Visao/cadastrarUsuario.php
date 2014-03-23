<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE HTML>
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
                    <div class="pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="../index.php">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="container login" style="padding: 30px;">
            <div class="col-md-4 col-md-offset-4 well-lg login">
                <div class="formLogin">
                    <img src="http://localhost/SeboEletronicov2.0/Visao/img/sebo_header.png" style="margin-right: auto; margin-left: auto;"/>
                    <form name="Insere Dados" method="post" action="http://localhost/SeboEletronicov2.0/Utilidades/RecebeForm.php" class="form-horizontal" role="form">
                        <input name="nome" type="text" class="form-control" placeholder="Nome" required/>
                        <input name="email" type="text" class="form-control" placeholder="E-mail" required/>
                        <input name="telefone" type="text" class="form-control" placeholder="Telefone" required/>
                        <input name="senha[]" type="password" class="form-control" placeholder="Senha"  maxlength="6" required/>
                        <input name="senha[]" type="password" class="form-control" placeholder="Confirmar senha"  maxlength="6" required/>
                        <input type="hidden" name="tipo" value="cadastrar"/>
                        <!--<input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar campos' />-->
                        <input class="btn btn-lg btn-primary btn-block" type="submit" name='Enviar' value="ENVIAR" title='Enviar dados'>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>