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
            <?php 
            include_once '../Utilidades/BarraNavegacao.php'; 
            include_once '../Controle/LivroControlador.php'; 
            
            $livro = LivroControlador::getLivroById($_POST['id_livro']);
            
            ?>
        </div>
    </body>
</html>