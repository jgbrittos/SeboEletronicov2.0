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
            
            //E-mail para o Vendedor com as informações do comprador e qual livro
            
            $mensagemParaVendedor ='<html>
                            <body>
                                <table background = "http://i.imgur.com/GX69Php.jpg" height = "800" width=" 650" padding-top = "300" padding-right= "100" padding-bottom ="300" padding-left= "100">
                                    <tr>
                                        <td valign="top">
                                            <br><br><br><br><br><br><br><br><br><br><br><br>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Livro: '.$tituloLivro.'</br></font>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Comprador: '. $comprador->getNome(). '</br></font>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefone: '.$comprador->gettelefone().' </br></font>                          
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail: '.$comprador->getEmail().' </br></font>                          
                                        </td>
                                    </tr>
                                </table>		
                            </body>
                        </html>';

            $subjectVendedor = 'Existe uma pessoa interessada em um livro seu!'; // Assunto.
            $toVendedor = $vendedor->getEmail(); // Para.
            $bodyVendedor = $mensagemParaVendedor; // corpo do texto.
            $headersVendedor = 'From: Sebo Eletrônico <suporte@seboeletronico.hol.es>' . "\r\n";//de quem
            $headersVendedor .= "Content-Type: text/html" . "\r\n";
            
            //E-mail para o Comprador com as informações do vendedor e qual livro
            
            $mensagemParaComprador ='<html>
                            <body>
                                <table background = "http://i.imgur.com/GX69Php.jpg" height = "800" width=" 650" padding-top = "300" padding-right= "100" padding-bottom ="300" padding-left= "100">
                                    <tr>
                                        <td valign="top">
                                            <br><br><br><br><br><br><br><br><br><br><br><br>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Livro: '.$tituloLivro.'</br></font>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Dono do livro: '. $vendedor->getNome(). '</br></font>
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefone: '.$vendedor->getTelefone().' </br></font>                          
                                            <br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail: '.$vendedor->getEmail().' </br></font>                          
                                        </td>
                                    </tr>
                                </table>		
                            </body>
                        </html>';

            $subjectComprador = 'Olá! Parece que você gostou de algum Livro do Sebo Eletrônico!'; // Assunto.
            $toComprador = $comprador->getEmail(); // Para.
            $bodyComprador = $mensagemParaComprador; // corpo do texto.
            $headersComprador = 'From: Sebo Eletrônico <suporte@seboeletronico.hol.es>' . "\r\n";//de quem
            $headersComprador .= "Content-Type: text/html" . "\r\n";
            
            $retornoEmailVendedor = mail($toVendedor,$subjectVendedor,$bodyVendedor,$headersVendedor);
            $retornoEmailComprador = mail($toComprador,$subjectComprador,$bodyComprador,$headersComprador);
            
            if ($retornoEmailVendedor && $retornoEmailComprador){
                //echo 'E-mail enviado com sucesso!';
                ?>
                <div class="modal fade" id="deucerto" tabindex="-1" role="dialog" aria-labelledby="modalPesquisaPessoaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title"><b>E-mail enviado com sucesso!</b></h3>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title">
                                    <ol>
                                        <li>Um e-mail foi enviado para você com as informações de contato do dono do livro: <?php echo $tituloLivro?></li>
                                        <li>Um e-mail foi enviado para o dono do livro, com as suas informações de contato.</li>
                                    </ol>
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success center-block" data-dismiss="modal" onclick="window.location='livrosDisponiveis.php'">Ok</button>
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