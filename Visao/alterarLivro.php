<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];

include '../Controle/LivroControlador.php';

$id = $_REQUEST['id'];

$livro = LivroControlador::getLivroById($id);

$textoInformativo = "Ao não marcar nenhuma das opções, será considerado que você escolheu as duas opções.";
?>

<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="Css/bootstrap.3.0.3/bootstrap.css"/>
        <link rel="stylesheet" href="Css/todc-bootstrap.3/todcBootstrap.3.css"/>
        <link rel="stylesheet" href="Css/estilo.css"/>
        <script src="../Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>

    </head>
    <body>
        <div class="container">
            <?php include_once '../Utilidades/BarraNavegacao.php'; ?>
            <br><br><br><br>
            <h2>Alterar Livro</h2>
            <br><br>
            <div class="center-block" style="width: 68.66666666666667%;">
                <form class="form-horizontal" name="FrmPesquisaLivro" action="../Utilidades/RecebeFormLivro.php" method="post" role="form">
                    <div class="form-group">
                        <label for="titulo" class="col-sm-2 control-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título do livro" value="<?php echo $livro->getTitulo() ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="autor" class="col-sm-2 control-label">Autor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor principal do livro" value="<?php echo $livro->getAutor() ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editora" class="col-sm-2 control-label">Editora</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="editora" id="editora" placeholder="Editora do livro" value="<?php echo $livro->getEditora() ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edicao" class="col-sm-2 control-label">Edição</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" min="1" max="20" step="1" value="1" name="edicao" id="edicao" value="<?php echo $livro->getEdicao() ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="col-sm-2 control-label">Descrição (opcional)</label>
                        <div class="col-sm-10">
                            <input type="textarea" class="form-control" name="descricao" id="descricao" placeholder="Insira aqui uma breve descrição do livro" value="<?php echo $livro->getDescricao() ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado" class="col-sm-2 control-label">Estado</label>
                        <div class="col-sm-10">
                            <input type="radio" id="novo" name="estado" value="novo"/> Novo <br/>
                            <input type="radio" id="usado" name="estado" value="usado"/> Usado <br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="classificacao" class="col-sm-2 control-label">Tipo(s) de operação</label>
                        <div class="col-sm-10">
                            <input type="checkbox" id="venda" name="venda" value="venda" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="<?php echo $textoInformativo; ?>" /> Venda <br/>
                            <input type="checkbox" id="troca" name="troca" value="troca" data-trigger="hover" data-toggle="popover" data-placement="bottom" data-content="<?php echo $textoInformativo; ?>" /> Troca <br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="classificacao" class="col-sm-2 control-label">Classificação</label>
                        <div class="col-sm-10">
                            <input type="radio" id="Engenharia" name="genero" value="Engenharia" checked/> Engenharia <br/>
                            <input type="radio" id="Engenharia de Software" name="genero" value="Engenharia de Software"/> Engenharia de Software <br/>
                            <input type="radio" id="Engenharia de Energia" name="genero" value="Engenharia de Energia"/> Engenharia de Energia <br/>
                            <input type="radio" id="Engenharia Eletronica" name="genero" value="Engenharia Eletronica"/> Engenharia Eletrônica <br/>
                            <input type="radio" id="Engenharia Automotiva" name="genero" value="Engenharia Automotiva"/> Engenharia Automotiva <br/>
                            <input type="radio" id="Engenharia Aeroespacial" name="genero" value="Engenharia Aeroespacial"/> Engenharia Aeroespacial <br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="tipo" value="alterarLivro"/>
                            <input type="hidden" name="id" value="<?php echo $id ?>"/>
                            <input type="hidden" name="id_dono" value="<?php echo $id_usuario ?>"/>
                            <input class="btn btn-primary" type="submit" name='Cadastrar' value="Cadastrar" title='Cadastrar livro'/>
                            <input class="btn btn-default" id="limparDados" type="reset" name='Limpar' value="Limpar campos" />
                            <div class="pull-right">
                                <input class="btn btn-default" type="button" onclick="home()" style="width: 85px;" value="Cancelar" title='Cancelar'/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php include_once '../Utilidades/Rodape.php';?>
        </div>
        <script type="text/javascript" src="js/js/compressedProductionJquery.2.0.3.js"></script>
        <script type="text/javascript" src="js/js/bootstrap.3.0.3/bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                document.getElementById('<?php echo $livro->getGenero();?>').checked = true;
                document.getElementById('<?php echo $livro->getEstado();?>').checked = true;
                <?php
                    if(!empty($livro->getVenda()) && empty($livro->getTroca())){
                ?>
                        document.getElementById('<?php echo $livro->getVenda();?>').checked = true;
                <?php
                    }elseif(!empty($livro->getTroca()) && empty($livro->getVenda())){
                ?>
                        document.getElementById('<?php echo $livro->getTroca();?>').checked = true;
                <?php 
                    }else{
                ?>
                        document.getElementById('<?php echo $livro->getTroca();?>').checked = true;
                        document.getElementById('<?php echo $livro->getVenda();?>').checked = true;
                <?php 
                    }
                ?>        
            });

            $('#venda').popover('hide');
            $('#troca').popover('hide');
        </script>
    </body>
</html>

