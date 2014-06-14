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
            
            $id_livro = $_GET['id_livro'];
            $livro = LivroControlador::getLivroById($id_livro);
            ?>
        
        <br><br><br><br>
        <b>Título:</b> <?php echo $livro->getTitulo();?><br>
        <b>Autor:</b> <?php echo $livro->getAutor();?><br>
        <b>Editora:</b> <?php echo $livro->getEditora() ?><br>
        <b>Edição:</b> <?php echo $livro->getEdicao() ?><br>
        <b>Descrição:</b> <?php echo $livro->getDescricao() ?><br>
        <b>Tipo(s) de operação:</b> <?php echo $livro->getVenda() . '<br>' . $livro->getTroca();?><br>
        <b>Gênero:</b> <?php echo $livro->getGenero() ?><br>
        <b>Estado:</b> <?php echo $livro->getEstado() ?><br>
            
        </div>
        <h2>Deixe sua Opinião</h2>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        </script>  
        <div class="fb-comments" data-href="seboeletronico.hol.es/Visao/perfilLivro.php?id_livro=<?php echo $id_livro;?>" data-width="760" data-numposts="10" data-colorscheme="light"></div>
    </body>
</html>