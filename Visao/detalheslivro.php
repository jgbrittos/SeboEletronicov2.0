<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE HTML>
<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="Css/estilo.css"/>
        <link rel="stylesheet" href="Css/bootstrap.3.0.3/bootstrap.css"/>
        <link rel="stylesheet" href="Css/todc-bootstrap.3/todcBootstrap.3.css"/>
        <script type="text/javascript" src="js/js/bootstrap.3.0.3/bootstrap.js"></script>
        <script type="text/javascript" src="js/js/compressedProductionJquery.2.0.3.js"></script>
        <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>
    </head>
    <body>
        <div class="container">
            <?php include_once '../Utilidades/BarraNavegacao.php'; ?>
            <br><br><br><br>
        </div>
        
        <?php
        include '../Controle/UsuarioControlador.php';
        include '../Controle/LivroControlador.php';
        
        $id_livro = $_GET['id_livro'];
        $email_usuario = $_SESSION["email"];

        $usuario = UsuarioControlador::pesquisaUsuarioPorParametro($email_usuario, "email_usuario");
        $livro = LivroControlador::getLivroById($id_livro);
        ?>

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
                <td><?php echo $livro->getTitulo() ?></td>
                <td><?php echo $livro->getAutor() ?></td>
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
<!--                <td>
                    <a href="http://localhost/SeboEletronicov2.0/Visao/alterarLivro.php?id=<?php // echo $valor['id_livro'] ?> " title="Alterar Livro"> <img src="img/icone_lapis.png" align="left"> </a> <br />
                </td>
                <td>
                    <a data-toggle="modal" data-target="<?php // echo "#" . $nomeModal ?>" href="#" title="Excluir Livro"> <img src="img/icone_lixeira.png" align="right" ></a>
                </td>-->
            </tbody>
        </table>
<!--        <div id="formulario">
            <form name="comprarlivro" method="post" action="compralivro.php">

                <input type = "hidden" name="nome_comprador" value= "<?php //echo $nome_comprador; ?>" >
                <input type="hidden" name="tel_comprador" value= " <?php //echo $tel_comprador; ?>" >
                <input type="hidden" name="id_livro" value=" <?php //echo $id_livro; ?>" >
                <input type="hidden" name="id_dono" value=" <?php //echo $id_dono; ?>" >
                <input type="submit" value="Comprar" />
                <label for="pergunta"></label>
            </form>
        </div>

        <div id="formulariotop"> 
            <form name="enviarpergunta" method="post" action="detalheslivro.php"> 
                <h6>Envie sua mensagem:</h6>
                <br>
                <textarea name="mural" value="mural" rows="5" cols="45" ></textarea>
                <input type="hidden" value="nome_comprador" name="nome_comprador">
                <input type="hidden" name="id_livro" value="<?php //echo $id_livro; ?>">
                <input type="submit" value="Enviar" />  
            </form>
-->
<?php
//include "..\Dao\conexao_bd.inc";
//if (!$bd)
//    die("<h1>Falha no bd </h1>");
//
//$strSQL3 = "SELECT * FROM mural WHERE id_livro = '" . $id_livro . "' ORDER BY id_comentario DESC";
//
//$rs3 = mysql_query($strSQL3);
//
//while ($row3 = mysql_fetch_array($rs3)) {
//    echo $row3['nome_pergunta'];
//    echo " disse: ";
//    echo $row3['texto'];
//    echo " <br /> <br />";
//}
//?> 


    </body>
<?php include_once '../Utilidades/Rodape.php'; ?>
</html>