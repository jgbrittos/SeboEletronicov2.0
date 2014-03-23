<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
$senhaFinal = $_SESSION['senha'];
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
            <h2>Atualizar cadastro</h2>
            <br><br>
            <div class="center-block" style="width: 68.66666666666667%;">
                <form class="form-horizontal" name="Insere Dados" action="http://localhost/SeboEletronicov2.0/Utilidades/RecebeForm.php" method="post" role="form">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " id="nome" placeholder="Nome" value="<?php echo $cadastro ['nome_usuario'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $cadastro['email_usuario'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefone" placeholder="Telefone" value="<?php echo $cadastro['telefone_usuario'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="col-sm-2 control-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="senha" placeholder="Senha" value="<?php echo $senhaFinal ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmaSenha" class="col-sm-2 control-label">Confirmar senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirmaSenha" placeholder="Confirmar senha" value="<?php echo $senhaFinal ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="tipo" value="alterar"/>
                            <input type="hidden" name="senhaAntiga" value="<?php echo $senhaFinal ?>"/>
                            <input type="hidden" name="id_pessoa" value="<?php echo $id_usuario ?>" />
                            <input class="btn btn-primary" type="submit" name='Enviar' value="Enviar" title='Enviar dados'/>
                            <input class="btn btn-default" type="reset" name='Limpar' value="Restaurar dados" title='Restaurar dados'/> 
                            <div class="pull-right">
                                <input class="btn btn-default" onclick="home()" style="width: 85px;" value="Cancelar" title='Cancelar'/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>