<?php
include "../Utilidades/ConexaoComBanco.php";

class LivroDao {
    
    public function salvaLivro($livro, $id_dono){

        $sql = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca)
            VALUES ('".$id_dono."','".$livro->getTitulo()."','".$livro->getEditora()."','".$livro->getAutor()."',
                '".$livro->getEdicao()."','".$livro->getGenero()."','".$livro->getEstado()."','".$livro->getDescricao()."','".$livro->getVenda()."',
                    '".$livro->getTroca()."')";
        $livro = mysql_query($sql);
        return $livro;
    }

    public function pesquisaLivroDao($titulo){
        $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."'";
        
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
    
    public function alteraLivro($livro, $id_dono, $id_usuario){

        $sql = "UPDATE livro SET id_dono = '".$id_usuario."', titulo_livro = '".$livro->getTitulo()."', editora = '".$livro->getEditora()."', 
            autor = '".$livro->getAutor()."', edicao = '".$livro->getEdicao()."', genero = '".$livro->getGenero()."', estado_conserv = '".$livro->getEstado()."', 
                descricao_livro = '".$livro->getDescricao()."', venda = '".$livro->getVenda()."', troca = '".$livro->getTroca()."' WHERE id_livro = '".$id_dono."'";
        $livro = mysql_query($sql);
        
        return $livro;
    }   
    
    public function getLivroByIdUsuario($idUsuario){
        
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
    
    public function getAllLivro($id_dono){
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

