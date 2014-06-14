<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="Css/bootstrap.3.0.3/bootstrap.css"/>
        <link rel="stylesheet" href="Css/todc-bootstrap.3/todcBootstrap.3.css"/>
        <link rel="stylesheet" href="Css/estilo.css"/>
        <script type="text/javascript" src="js/js/compressedProductionJquery.2.0.3.js"></script>
        <script type="text/javascript" src="js/js/bootstrap.3.0.3/bootstrap.js"></script>
        <script src="../Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>

    </head>
    <body>
        <div class="container">
            <?php include_once '../Utilidades/BarraNavegacao.php'; ?>
            <br><br><br>

            <div class="center-block" style="width: 68.66666666666667%;">
                <h2>Pesquisa de livros</h2>
                <br><br><br>
                <form class="form-horizontal" name="FrmPesquisaLivro" action="../Utilidades/RecebeFormLivro.php" method="post" role="form">
                    <div class="form-group">
                        <label for="titulo" class="col-sm-2 control-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="titulo" id="titulo" placeholder="Título do livro" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado" class="col-sm-2 control-label">Estado</label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="novo" value="novo"/> Novo
                            <input type="checkbox" name="usado" value="usado"/>    Usado<br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="classificacao" class="col-sm-2 control-label">Tipo(s) de operação</label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="venda" value="venda"/> Venda
                            <input type="checkbox" name="troca" value="troca"/>    Troca<br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="tipo" value="pesquisaLivro"/>
                            <input class="btn btn-primary" type="submit" name='Pesquisar' value="Pesquisar" title='Pesquisar Livro'/>
                            <input class="btn btn-default" id="restauraDados" type="reset" name='Limpar' value="Limpar campos" />
                            <div class="pull-right">
                                <input class="btn btn-default" type="button" onclick="home()" style="width: 85px;" value="Cancelar" title='Cancelar'/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php include_once '../Utilidades/Rodape.php'; ?>
        </div>
    </body>
</html>



