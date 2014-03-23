<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
$senha = $_SESSION['senha'];
include '../Controle/UsuarioControlador.php';
$cadastro = UsuarioControlador::checaCadastroId($id_usuario);
?>
<!DOCTYPE HTML>
<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="Css/bootstrap.3.0.3/bootstrap.css"/>
        <link rel="stylesheet" href="Css/todc-bootstrap.3/todcBootstrap.3.css"/>
        <link rel="stylesheet" href="Css/estilo.css"/>
        <script type="text/javascript" src="js/js/compressedProductionJquery.2.0.3.js"></script>
        <script type="text/javascript" src="js/js/bootstrap.3.0.3/bootstrap.js"></script>
        <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>

    </head>
    <body>
        <div class="container">
            <?php include_once '../Utilidades/BarraNavegacao.php'; ?>
            <br><br><br><br>
            <h2>Excluir cadastro</h2>
            <br><br>

            <div class="center-block" style="width: 68.66666666666667%;">
                <form class="form-horizontal" name="Insere Dados" action="http://localhost/SeboEletronicov2.0/Utilidades/RecebeForm.php" method="post" role="form">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <h3> <?php echo $cadastro['nome_usuario'] ?></h3>
                            <input type="hidden" name="tipo" value="deletar"/>
                            <input type="hidden" name="email" value="<?php echo $cadastro['email_usuario'] ?>"/>
                            <input type="hidden" name="senha" value="<?php echo $senha ?>"/>
                            <input class="btn btn-primary" type="submit" name='Excluir' value="Enviar" title='Enviar dados'/>
                            <input class="btn btn-default" onclick="home()" style="width: 85px;" value="Cancelar" title='Cancelar'/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>