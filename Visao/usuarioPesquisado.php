<?php 
    session_start();
    $id_usuario = $_SESSION['id_usuario'];
    include '../Controle/UsuarioControlador.php';
    $nome = $_REQUEST['nome'];
    $pesquisado = UsuarioControlador::pesquisaUsuario($nome);
    
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
        <script src="../Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>
</head>
<body>
    
     <div class="container">
            <?php include_once '../Utilidades/BarraNavegacao.php'; ?>
            <br><br><br><br>
            <h2>Usuário pesquisado</h2>
            <br><br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Entre em contato</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($pesquisado != false) {
                        $i = 0;
                        foreach ($pesquisado as $chave => $valor) {
                            $i++;
                            ?>  
                            <tr>
                                <td><?php echo $valor['nome_usuario'];?></td>
                                <td><?php echo $valor['telefone_usuario'];?></td>
                                <td><?php echo $valor['email_usuario'];?></td>
                                <td>imagem de telefone</td>
                            </tr>
                        <?php
                    }
                } else {
                    ?>
                    </tbody>
                </table>
                <div class="alert alert-info">Ops! Parece que a pesquisa não retornou nenhum resultado!</div>
                <?php
            }
            ?>
        <?php include_once '../Utilidades/Rodape.php'; ?>
        </div>
</body>
</html>



