<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
$id_dono = $_POST['idDono'];
var_dump($id_dono);
exit;
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
    <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
    <title>Sebo Eletrônico</title>
</head>
<body>
    <div class="container">
        <?php include_once '../Utilidades/BarraNavegacao.php'; ?>
        <br><br><br><br>
        
        <?php 
            include 'Usuario.php';

            $destinatario = Usuario::getEmail();
            $mensagem ='<html>
                            <body>
                                <table background = "http://i.imgur.com/GX69Php.jpg" height = "800" width=" 650" padding-top = "300" padding-right= "100" padding-bottom ="300" padding-left= "100">
                                    <tr>
                                        <td valign="top">
                                            <br><br><br><br><br><br><br><br><br><br><br><br>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Livro: </br></font>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Comprador: </br></font>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: </br></font>                          
                                        </td>
                                    </tr>
                                </table>		
                            </body>
                        </html>';


            $subject= 'Existe uma pessoa interessada no seu Livro - Sebo Eletrônico'; // Assunto.
            $to= $destinatario; // Para.
            $body= $mensagem; // corpo do texto.
            if (mail($to,$subject,$body,"Content-Type: text/html")){
                echo 'e-mail enviado com sucesso!';
            } else {
                echo 'e-mail nao enviado!';
            }
        ?>
    </div>
</body>
</html>