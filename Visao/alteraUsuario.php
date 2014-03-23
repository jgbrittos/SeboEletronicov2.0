<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
$senhaFinal = $_SESSION['senha'];
include '../Controle/UsuarioControlador.php';

$cadastro = UsuarioControlador::checaCadastroId($id_usuario);
$textoInformativo = "Restaurar dados serve para redefinir os dados alterados não salvos aos que eram antes.";
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
                            <input type="text" class="form-control " name="nome" id="nome" placeholder="Nome" value="<?php echo $cadastro ['nome_usuario'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $cadastro['email_usuario'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone" value="<?php echo $cadastro['telefone_usuario'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="col-sm-2 control-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="senha[]" maxlength="6" id="senha" placeholder="Senha" value="<?php echo $senhaFinal ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmaSenha" class="col-sm-2 control-label">Confirmar senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="senha[]" maxlength="6" id="confirmaSenha" placeholder="Confirmar senha" value="<?php echo $senhaFinal ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="tipo" value="alterar"/>
                            <input type="hidden" name="senhaAntiga" value="<?php echo $senhaFinal ?>"/>
                            <input type="hidden" name="id_pessoa" value="<?php echo $id_usuario ?>" />
                            <input class="btn btn-primary" type="submit" name='Enviar' value="Enviar" title='Enviar dados'/>
                            <input class="btn btn-default" id="restauraDados" type="reset" name='Limpar' value="Restaurar dados" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="<?php echo $textoInformativo ?>"/>
                            <div class="pull-right">
                                <input class="btn btn-danger" type="button" onclick="emitirModalConfirmacao()" style="width: 130px;" value="Excluir cadastro" title='Excluir cadastro'/>
                                <input class="btn btn-default" type="button" onclick="home()" style="width: 85px;" value="Cancelar" title='Cancelar'/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Excluir cadastro -->
        <div class="modal fade" id="modalExcluirCadastro" tabindex="-1" role="dialog" aria-labelledby="modalExcluirCadastroLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNaoPublicarLabel">Caro <?php echo $cadastro['nome_usuario'] ?>, </h5>
                    </div>
                    <div class="modal-body">
                        <p style="text-align: left">
                            <br />
                            Ao excluir sua conta:</p>
                        <ol type="a" style="text-align: left">
                            <li>Não será possível restaurar seus dados, nem livros anunciados.</li>
                        </ol>
                        <br />
                        <p style="text-align: left; font-size: larger"><b>Deseja confirmar a exclusão?</b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="document.ExcluiUsuario.submit();">Confirmar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <form class="form-horizontal" name="ExcluiUsuario" action="http://localhost/SeboEletronicov2.0/Utilidades/RecebeForm.php" method="post" role="form">
            <input type="hidden" name="tipo" value="deletar"/>
            <input type="hidden" name="email" value="<?php echo $cadastro['email_usuario'] ?>"/>
            <input type="hidden" name="senha" value="<?php echo $senha ?>"/>
        </form>

        <script type="text/javascript" src="js/js/compressedProductionJquery.2.0.3.js"></script>
        <script type="text/javascript" src="js/js/bootstrap.3.0.3/bootstrap.js"></script>
        <script>
                $('#restauraDados').popover('hide');

                function emitirModalConfirmacao() {
                    $(document).ready(function() {
                        $('#modalExcluirCadastro').modal('show');
                    });
                }
        </script>
    </body>
</html>