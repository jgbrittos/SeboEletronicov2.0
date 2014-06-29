<?php

include "../Utilidades/ConexaoComBanco.php";
include_once '../Utilidades/LivroDao.php';

class LivroEletronicoDao implements LivroDao{
    
    private static $instance;
    
    private function __construct() {}

    //Singleton Pattern
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new LivroEletronicoDao();
        }
        return self::$instance;
    }
    public function salvaLivro($livro, $id_dono) {
        $sql = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca, caminhoLivroEletronico)
            VALUES ('".$id_dono."','".$livro->getTitulo()."','".$livro->getEditora()."','".$livro->getAutor()."',
                '".$livro->getEdicao()."','".$livro->getGenero()."','NSA','".$livro->getDescricao()."','NSA',
                    'NSA', '".$livro->getCaminhoDiretorio()."')";
        $livro = mysql_query($sql);
        return $livro;
    }
    
    public function alteraLivro($livro, $id_dono, $id_usuario) {
        
    }

    public function pesquisaLivro($titulo) {
        $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND caminhoLivroEletronico <> 'NSA'";
        
        $result = mysql_query($sql);
        
        $livros = array();
        
        while($registro = mysql_fetch_assoc($result) ) {
            array_push($livros, $registro);
        }
        
        if(count($livros) == 0){
            return false;
        }
        
        return $livros;
    }

}
