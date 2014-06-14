<?php
include_once '../Controle/LivroControlador.php';

if(!empty($_POST['tipo'])) {
    switch ($_POST['tipo']) {
        case "cadastraLivro":
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $editora = $_POST['editora'];
            $edicao = $_POST['edicao'];
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
            $genero = $_POST['genero'];
            $estado = $_POST['estado'];
            $descricao = $_POST['descricao'];
            $id_dono = $_POST['id_dono'];


            $salvo = LivroControlador::salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono);


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
            $genero = $_POST['genero'];
            $estado = $_POST['estado'];
            $descricao = $_POST['descricao'];
            $id_dono = $_POST['id_dono'];
            $id = $_POST['id'];

            LivroControlador::alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id, $id_dono);
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
                LivroControlador::deletaLivro($idLivro);
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

