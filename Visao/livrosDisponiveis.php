<?php
session_start();
include '../Controle/LivroControlador.php';
$id = $_SESSION['id_usuario'];

$listaLivros = LivroControlador::getAllLivro($id);
?>

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
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-9">
                    <div class="jumbotron">
                        <h1>Livros disponíveis</h1>
                        <p>Aqui você pode acompanhar todos os livros disponíveis para venda e troca.</p>
                    </div>
                    <div class="row">
                        <?php 
                            if ($listaLivros) {
                                foreach ($listaLivros as $chave => $valor) { ?>              
                                    <div class="col-6 col-sm-6 col-lg-4" style="width: 292px; height: 297px;">
                                        <h3><?php echo $valor['titulo_livro'] ?></h3>
                                        <p style="text-align: justify">
                                            <?php
                                            if (empty($valor['descricao_livro'])) {
                                                echo "Descrição indisponível.";
                                            } else {
                                                if (strlen($valor['descricao_livro']) <= 100) {
                                                    echo $valor['descricao_livro'];
                                                } else {
                                                    echo substr($valor['descricao_livro'], 0, 100) . "(...)";
                                                }
                                            }
                                            ?>
                                        </p>
                                        <p><a class="btn btn-default" href="#" role="button" onclick="window.location = 'http://localhost/SeboEletronicov2.0/Visao/detalhesLivro.php?id_livro=<?php echo $valor['id_livro'] ?>'">Ver detalhes »</a></p>
                                    </div>
                        <?php 
                                }
                            }else{
                        ?>
                        <div class="alert alert-info">Ops! Parece que ainda não existe nenhum livro cadastrado no sistema!</div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php include_once '../Utilidades/Rodape.php'; ?>
        </div>
    </body>
</html>
