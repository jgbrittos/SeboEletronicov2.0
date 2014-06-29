<?php

include "../Utilidades/ConexaoComBanco.php";

abstract class LivroDao {
    public abstract function salvaLivro($livro, $id_dono);
    public abstract function alteraLivro($livro, $id_livro);
    public abstract function pesquisaLivro($titulo);
    
    public function defineTipoLivro($id_livro){
        $sql = "SELECT caminhoLivroEletronico FROM livro WHERE id_livro = '".$id_livro."'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }
    
}
