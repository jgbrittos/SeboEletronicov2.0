<?php
session_start();
if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: entrarLogin.php");
    exit;
}
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
            <br><br><br><br><br>
            <div align="center">
                <font size="+3" style="font-family: verdana, sans-serif;">Seja Bem Vindo ao Sebo Eletrônico!</font>
            </div>
            <br>
            <table>
                <tr>
                    <td style="padding: 50px"><img src="img/Login.png" class="img3" /></td>
                    <td style="text-align: justify;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus pharetra justo et varius. Integer molestie massa nunc, 
                        aliquet rhoncus orci gravida in. Praesent a nulla sem. Sed fermentum dui eget risus adipiscing dapibus. Quisque a orci risus. 
                        Proin ultrices mauris quam, non lacinia metus feugiat eget. Proin sodales sagittis tristique. Sed commodo sem sit amet odio 
                        porttitor egestas. Aliquam erat volutpat. Nullam mollis a mi a sollicitudin. Suspendisse elit augue, pharetra sit amet orci non, 
                        imperdiet luctus urna. Cras a elementum dolor. Donec in ante sapien.
                    </td>
                </tr>
            </table>
            
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
            <div class="fb-comments" data-href="indexLogin.php" data-width="760" data-numposts="10" data-colorscheme="light"></div>
            
            <?php include_once '../Utilidades/Rodape.php'; ?>
        </div>
    </body>
</html>