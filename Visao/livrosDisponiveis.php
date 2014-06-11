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
                    <div class="jumbotron ">
                        <h2>Livros disponíveis</h2>
                        <p>Aqui você pode acompanhar todos os livros disponíveis para venda e troca.</p>
                    </div>
                    <div class="row">
                        <?php 
                            if ($listaLivros) {
                                foreach ($listaLivros as $chave => $valor) {?>
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
                                        <p><a class="btn btn-default" href="#" data-toggle="modal" data-target="#detalhesLivro<?php echo $valor['id_livro']?>" role="button">Ver detalhes »</a></p>
                                        <!--onclick="window.location = 'http://localhost/SeboEletronicov2.0/Visao/detalhesLivro.php?id_livro=<?php //echo $valor['id_livro'] ?>'"-->
                                    </div>
                                    <div class="modal fade" id="detalhesLivro<?php echo $valor['id_livro']?>" tabindex="-1" role="dialog" aria-labelledby="modalPesquisaPessoaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" name="titulo" id="detalhesLivroLabel"><b> <?php echo $valor['titulo_livro'] ?> </b></h3>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="modal-title" id="detalhesLivroLabel"><b>Autor:</b> <?php echo $valor['autor'] ?></h5><br>
                                                    <h5 class="modal-title" id="detalhesLivroLabel"><b>Editora:</b> <?php echo $valor['editora'] ?></h5><br>
                                                    <h5 class="modal-title" id="detalhesLivroLabel"><b>Edição:</b> <?php echo $valor['edicao'] ?></h5><br>
                                                    <h5 class="modal-title" id="detalhesLivroLabel"><b>Descrição:</b> <?php echo $valor['descricao_livro'] ?></h5><br>
                                                    <h5 class="modal-title" id="detalhesLivroLabel"><b>Tipo(s) de operação:</b> <?php echo $valor['venda'] . '<br>' . $valor['troca'];?></h5><br>
                                                    <h5 class="modal-title" id="detalhesLivroLabel"><b>Gênero:</b> <?php echo $valor['genero'] ?></h5><br>
                                                    <h5 class="modal-title" id="detalhesLivroLabel"><b>Estado:</b> <?php echo $valor['estado_conserv'] ?></h5><br>
                                                </div>
                                                <script type="text/javascript">
                                                    //passando variavel do php para o js e usando na linha 73
                                                    //http://www.mauricioprogramador.com.br/posts/passar-variavel-javascript-para-php
                                                    var idDono = "<?php echo $valor['id_dono'];?>";
                                                </script>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                    <button type="button" id="pesquisar" class="btn btn-primary" data-dismiss="modal" onclick="passaIdDono(idDono)">Comprar</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <script>
                                        function passaIdDono(id_dono) {
                                            $("input[name=idDono]").val(id_dono);
                                            document.FrmComprarLivro.submit();
                                        }
                                    </script>
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
        
        <form  name="FrmComprarLivro" action="http://localhost/SeboEletronicov2.0/Visao/compralivro.php" method="post">
            <input type="hidden" name="idDono" />
        </form>
    </body>
</html>
