<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="Css/bootstrap.3.0.3/bootstrap.css"/>
        <link rel="stylesheet" href="Css/todc-bootstrap.3/todcBootstrap.3.css"/>
        <link rel="stylesheet" href="Css/estilo.css"/>
        <link rel="shortcut icon" href="http://localhost/SeboEletronicov2.0/Visao/img/android.ico">
        <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>

    </head>
    <body>
        <div class="container login" style="padding: 30px;">
            <div class="col-md-4 col-md-offset-4 well-lg login">
                <div class="formLogin">
                    <img src="http://localhost/SeboEletronicov2.0/Visao/img/sebo_header.png" style="margin-right: auto; margin-left: auto;" alt="TESTE"/>
                    <form name="FrmLogin" method="post" action="http://localhost/SeboEletronicov2.0/Dao/AutenticaUsuario.php" id="FrmLogin" class="form-horizontal" role="form">
                        <input id="inputCPF" name="cpf" type="text" class="form-control" placeholder="E-mail" required/>
                        <input id="inputSenha" name="senha" type="password" class="form-control" placeholder="Senha"  maxlength="6" required/>
                        <input  id="btnEntrar" class="btn btn-lg btn-primary btn-block" type="submit">
                        <p class="text-center">
                            <a  href="cadastrarUsuario.php" class="Links" >Cadastre-se</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>