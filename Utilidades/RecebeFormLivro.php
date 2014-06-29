<?php
include_once '../Controle/LivroControlador.php';
$livroControlador = new LivroControlador();

if(!empty($_POST['tipo'])) {
    switch ($_POST['tipo']) {
        case "cadastraLivro":
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $editora = $_POST['editora'];
            $edicao = $_POST['edicao'];
            $genero = $_POST['genero'];
            $estado = $_POST['estado'];
            $descricao = $_POST['descricao'];
            $id_dono = $_POST['id_dono'];
            $tipoLivro = $_POST['tipoLivro'];
            $caminhoLivroEletronico = '';
            
            if(empty($_POST['venda']) && empty($_POST['troca'])){
                $venda = "venda";
                $troca = "troca";
            }elseif(empty($_POST['venda']) && !empty($_POST['troca'])){
                $troca = $_POST['troca'];
                $venda = "";
            }elseif(empty($_POST['troca']) && !empty($_POST['venda'])){
                $venda = $_POST['venda'];
                $troca = "";
            }else{
                $venda = $_POST['venda'];
                $troca = $_POST['troca'];
            }
            if($tipoLivro == 'eletronico'){
                // verifica se foi enviado um arquivo 
                if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

                    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
                    $nome = $_FILES['arquivo']['name'];

                    // Pega a extensao
                    $extensaoArquivo = strrchr($nome, '.');

                    // Converte a extensao para mimusculo
                    $extensao = strtolower($extensaoArquivo);

                    if(strstr('.pdf', $extensao)) {
                        $novoNome = md5(microtime()) . $extensao;

                        $caminhoLivroEletronico = '../livrosEmPdf/' . $novoNome; 
                        $retorno = move_uploaded_file($arquivo_tmp, $caminhoLivroEletronico);
                        // tenta mover o arquivo para o destino
                        if(!$retorno){
                            echo "<script>alert('Desculpe, mas um erro ocorreu ao tentar salvar o arquivo!')</script>";
                            echo "<script>window.location='../Visao/cadastrarLivro.php';</script>";
                            //Aparentemente você não tem permissão de escrita.";
                        }
                    } else {
                        echo "<script>alert('Você poderá enviar apenas arquivos \"*.pdf\')</script>";
                        echo "<script>window.location='../Visao/cadastrarLivro.php';</script>";
                    }
                } else {
                    echo "<script>alert('Você não selecionou nenhum arquivo!')</script>";
                    echo "<script>window.location='../Visao/cadastrarLivro.php';</script>";
                } 
            }
            
            $salvo = $livroControlador->salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $caminhoLivroEletronico, $id_dono);

            if (!empty($salvo)) {
                echo "<script>alert('Livro cadastrado com sucesso!')</script>";
            } else {
                echo "<script>('Falha ao cadastrar o livro, tente novamente.')</script>";
            }

            echo "<script>window.location='../Visao/indexLogin.php';</script>";

            break;

        case "alterarLivro":
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $editora = $_POST['editora'];
            $edicao = $_POST['edicao'];
            $genero = $_POST['genero'];
            $descricao = $_POST['descricao'];
            $estado = $_POST['estado'];
//            $id_dono = $_POST['id_dono'];
            $id_livro = $_POST['id'];
            
            if(empty($_POST['venda']) && empty($_POST['troca'])){
                $venda = "venda";
                $troca = "troca";
            }elseif(empty($_POST['venda']) && !empty($_POST['troca'])){
                $troca = $_POST['troca'];
                $venda = "";
            }elseif(empty($_POST['troca']) && !empty($_POST['venda'])){
                $venda = $_POST['venda'];
                $troca = "";
            }else{
                $venda = $_POST['venda'];
                $troca = $_POST['troca'];
            }
            

            $livroControlador->alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_livro);
            ?>
            <script language="Javascript" type="text/javascript">
                alert("Livro alterado com sucesso!!");
            </script>  

            <script language = "Javascript">
                window.location = "../Visao/indexLogin.php";
            </script><?php
            break;

        case "pesquisaLivro":
            $titulo = $_POST['titulo'];
            ?>
            
            <script>
                window.onload = function() {
                    document.FrmListaLivros.submit()
                };
            </script>
            <form name="FrmListaLivros" action="../Visao/listaDeLivros.php" method="post">
                <input type="hidden" name="titulo" value="<?php echo $titulo;?>"/>
            </form>
                <?php
            break;
        
        case "excluirLivro":
            if ($_REQUEST['id_livro']) {
                $idLivro = $_REQUEST['id_livro'];
                $livroControlador->deletaLivro($idLivro);
                ?>
                <script language="Javascript" type="text/javascript">
                    alert("Livro excluido com sucesso!!");
                </script>

                <script language = "Javascript">
                    window.location = "../Visao/meusLivros.php";
                </script><?php
            }
            break;
    }
}

