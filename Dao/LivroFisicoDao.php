<?php

include "../Utilidades/ConexaoComBanco.php";
include_once '../Utilidades/LivroDao.php';

class LivroFisicoDao extends LivroDao{
    //GRASP - Inheritance
    private static $instance;
    
    private function __construct() {}

    //Singleton Pattern
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new LivroFisicoDao();
        }
        return self::$instance;
    }
    
    public function salvaLivro($livro, $id_dono){
        $sql = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca, caminhoLivroEletronico)
            VALUES ('".$id_dono."','".$livro->getTitulo()."','".$livro->getEditora()."','".$livro->getAutor()."',
                '".$livro->getEdicao()."','".$livro->getGenero()."','".$livro->getEstado()."','".$livro->getDescricao()."','".$livro->getVenda()."',
                    '".$livro->getTroca()."', 'NSA' )";
        $livro = mysql_query($sql);
        return $livro;
    }

    public function pesquisaLivro($titulo){
        $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND caminhoLivroEletronico = 'NSA'";
        
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
    
    public function getLivroById($id){
        $sql = "SELECT * FROM livro WHERE id_livro = '".$id."'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }

    public function deletaLivro($id){
        $sql = "DELETE FROM livro WHERE id_livro = '".$id."'";
        $deletou = mysql_query($sql);
        return $deletou;
    }
    
    public function alteraLivro($livro, $id_livro){

        $sql = "UPDATE livro SET titulo_livro = '".$livro->getTitulo()."', editora = '".$livro->getEditora()."', 
            autor = '".$livro->getAutor()."', edicao = '".$livro->getEdicao()."', genero = '".$livro->getGenero()."', estado_conserv = '".$livro->getEstado()."', 
                descricao_livro = '".$livro->getDescricao()."', venda = '".$livro->getVenda()."', troca = '".$livro->getTroca()."' WHERE id_livro = '".$id_livro."'";
        $livro = mysql_query($sql);
        
        return $livro;
    }   
    
    public function recuperaLivroPorIdUsuarioDao($idUsuario){
        
        $sql = "SELECT * FROM livro WHERE id_dono = '".$idUsuario."'";
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
    
    public function pegaTodosLivrosDao($id_dono){
        $sql = "SELECT * FROM livro WHERE id_dono <> '".$id_dono."'";
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

