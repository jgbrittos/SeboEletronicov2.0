<?php

include_once '../Controle/UsuarioControlador.php';
$usuarioControlador = new UsuarioControlador();

switch($_POST['tipo']){      
    case "cadastrar":  
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];
      $senha = $_POST['senha'];

      $usuarioControlador->salvaUsuario($nome, $email, $telefone, $senha);
      ?>
        <script language="Javascript" type="text/javascript">
            alert("Usuario cadastrado com sucesso!!");
        </script>      

        <script language = "Javascript">
            window.location="../Visao/entrarLogin.php";
        </script>
      <?php

       break;

    case "alterar":
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];
      $senha = $_POST['senha'];
      $id = $_POST['id_pessoa'];
      $senhaVelha = $_POST['senhaAntiga'];

      $usuarioControlador->alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha);
      ?>
        <script language="Javascript" type="text/javascript">
            alert("Usuario alterado com sucesso!!");
        </script>      

        <script language = "Javascript">
            window.location="../Visao/indexLogin.php";
        </script>
      <?php

      break;  
    case "deletar": 
        $id_usuario = $_POST['id_usuario'];

        $usuarioControlador->deletaCadastro($id_usuario);
        ?>
            <script language="Javascript" type="text/javascript">
                alert("Usuario excluido  com sucesso!!");
            </script>   

            <script language = "Javascript">
                window.location="../index.php";
            </script>
        <?php
      break;
    case "pesquisar": 
        $nome = $_POST['nome']; ?>
        <script language = "Javascript">
          window.location="../Visao/usuarioPesquisado.php?nome=<?php echo $nome?>";
        </script><?php
      break;
    }
