<?php

include '../Controle/LivroControlador.php';
$titulo = $_POST['titulo'];
//$novo = $_POST['novo'];
//$usado = $_POST['usado'];
//$venda = $_POST['venda'];
//$troca = $_POST['troca'];

$listaLivros = LivroControlador::pesquisaLivro($titulo/*, $novo, $usado, $venda, $troca*/);
var_dump($listaLivros);
//$livro = LivroControlador::getLivroById($id);

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
            <h2>Livros pesquisados</h2>
            <br><br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Edição</th>
                        <th>Descrição</th>
                        <th>Tipo(s) de operação</th>
                        <th>Genero</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($livro) {
                        //foreach ($listaLivros as $chave => $valor) {
                            ?>  
                            <tr>
                                <td><?php echo $livro->getTitulo() ?></td>
                                <td><?php echo $livro->getAutor()?></td>
                                <td><?php echo $livro->getEditora() ?></td>
                                <td><?php echo $livro->getEdicao() ?></td>
                                <td><?php echo $livro->getDescricao() ?></td>
                                <td><?php
                                    echo $livro->getVenda();
                                    echo "<br/>";
                                    echo $livro->getTroca();
                                    ?>
                                </td>
                                <td><?php echo $livro->getGenero() ?></td>
                                <td><?php echo $livro->getEstado() ?></td>
                            </tr>
                        <?php
                        //}
                    } else {
                    ?>
                    </tbody>
                </table>
                <div class="alert alert-info">Ops! Parece que a busca não retornou nenhum resultado.</div>
                <?php
            }
            ?>
        <?php include_once '../Utilidades/Rodape.php'; ?>
        </div>
</body>
</html>
