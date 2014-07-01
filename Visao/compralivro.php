<?php session_start(); ?>
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
        
        <?php 
            include_once '../Controle/UsuarioControlador.php';
            
            $id_usuario = $_SESSION['id_usuario'];
            $id_dono = $_POST['idDono'];
            $tituloLivro = $_POST['tituloLivro'];
            
            $usuarioControlador = new UsuarioControlador();
            
            $vendedor = $usuarioControlador->pesquisaUsuarioPorParametro($id_dono, "id_usuario");
            $comprador = $usuarioControlador->pesquisaUsuarioPorParametro($id_usuario, "id_usuario");
            
            $mensagem ='<html>
                            <body>
                                <table background = "http://i.imgur.com/GX69Php.jpg" height = "800" width=" 650" padding-top = "300" padding-right= "100" padding-bottom ="300" padding-left= "100">
                                    <tr>
                                        <td valign="top">
                                            <br><br><br><br><br><br><br><br><br><br><br><br>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Livro: '.$tituloLivro.'</br></font>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Comprador:'. $comprador->getNome(). '</br></font>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:'.$comprador->getEmail().' </br></font>                          
                                        </td>
                                    </tr>
                                </table>		
                            </body>
                        </html>';


            $subject= 'Existe uma pessoa interessada em um livro seu!'; // Assunto.
            $to= $vendedor->getEmail(); // Para.
            $body= $mensagem; // corpo do texto.
            $headers = 'From: Sebo Eletrônico <suporte@seboeletronico.hol.es>' . "\r\n";//de quem
            $headers .= "Content-Type: text/html" . "\r\n";

            if (mail($to,$subject,$body,$headers)){
                //echo 'E-mail enviado com sucesso!';
                ?>
                <div class="modal fade" id="deucerto" tabindex="-1" role="dialog" aria-labelledby="modalPesquisaPessoaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title"><b></b>E-mail enviado com sucesso!</h5><br>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default center-block" data-dismiss="modal" onclick="window.location='livrosDisponiveis.php'">Ok</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <script>
                    $('#deucerto').modal('show');
                </script>
                <?php
            } else {
                echo 'Algo ocorreu! :( E-mail não enviado!';
            }
        ?>
    </div>
</body>
</html>