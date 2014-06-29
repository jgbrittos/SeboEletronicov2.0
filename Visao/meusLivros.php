<?php
session_start();
include '../Controle/LivroControlador.php';
$id = $_SESSION['id_usuario'];
$livroControlador = new LivroControlador();

$listaLivros = $livroControlador->recuperaLivroPorIdUsuario($id);
?>

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
            <br><br><br><br>
            <h2>Meus livros</h2>            
            <br><br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Formato</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Edição</th>
                        <th>Descrição</th>
                        <th>Tipo(s) de operação</th>
                        <th>Genero</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($listaLivros) {
                        $i = 1;
                        foreach ($listaLivros as $valor) {
                            $nomeModal = "modalExcluiLivro" . $i;
                            $i++;
                            ?>  
                            <tr>
                                <?php
                                    if(strcmp($valor['caminhoLivroEletronico'], 'NSA') == 0){ 
                                    ?>
                                        <td>Físico</td>
                                        <td><?php echo $valor['titulo_livro'] ?></td>
                                    <?php
                                    } else {
                                        ?>
                                        <td>Digital</td>
                                        <td><a href="<?php echo $valor['caminhoLivroEletronico'] ?>"><?php echo $valor['titulo_livro'] ?></a></td>
                                    <?php
                                    }
                                ?>
                                <td><?php echo $valor['autor'] ?></td>
                                <td><?php echo $valor['editora'] ?></td>
                                <td><?php echo $valor['edicao'] ?></td>
                                <td><?php echo $valor['descricao_livro'] ?></td>
                                <td><?php
                                    echo $valor['venda'];
                                    echo "<br/>";
                                    echo $valor['troca'];
                                    ?>
                                </td>
                                <td><?php echo $valor['genero'] ?></td>
                                <td><?php echo $valor['estado_conserv'] ?></td>
                                <td>
                                    <a href="../Visao/alterarLivro.php?id_livro=<?php echo $valor['id_livro'] ?> " title="Alterar Livro"> <img src="img/icone_lapis.png" align="left"> </a> <br />
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="<?php echo "#" . $nomeModal ?>" href="#" title="Excluir Livro"> <img src="img/icone_lixeira.png" align="right" ></a>
                                </td>
                            </tr>
                            <!-- Modal Excluir livro -->
                        <div class="modal fade" id="<?php echo $nomeModal; ?>" tabindex="-1" role="dialog" aria-labelledby="modalExcluiLivroLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modalNaoPublicarLabel"><b>Atenção!</b></h3>
                                    </div>
                                    <div class="modal-body">
                                        <p style="text-align: left">
                                            <br />
                                        <h4>Ao excluir este livro não será possível restaurá-lo.</h4>
                                        <br />
                                        </p>
                                        <p style="text-align: left; font-size: larger"><b>Deseja confirmar a exclusão?</b></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="excluiLivro()">Confirmar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <?php
                    }
                } else {
                    ?>
                    </tbody>
                </table>
                <div class="alert alert-info">Ops! Parece que você não possui nenhum livro cadastrado no sistema!</div>
                <?php
            }
            ?>
        <?php //include_once '../Utilidades/Rodape.php'; ?>
        </div>
        <script>
            function excluiLivro(){
                document.FrmExcluirLivro.submit()
            }
        </script>
        <form  name="FrmExcluirLivro" action="../Utilidades/RecebeFormLivro.php?id_livro=<?php echo $valor['id_livro'] ?>" method="post">
            <input type="hidden" name="tipo" value="excluirLivro"/>
        </form>
    </body>
</html>

