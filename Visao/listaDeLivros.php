<?php

include '../Controle/LivroControlador.php';
$id = $_REQUEST['livros'];

$valor = LivroControlador::getLivroById($id);

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
                    if ($valor) {
                        //foreach ($listaLivros as $chave => $valor) {
                            ?>  
                            <tr>
                                <td><?php echo $valor['titulo_livro']?></td>
                                <td><?php echo $valor['autor']?></td>
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
