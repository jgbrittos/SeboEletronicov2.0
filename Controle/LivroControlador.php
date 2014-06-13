<?php

include '../Modelo/Livro.php';
    
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono){
       if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        return LivroDao::salvaLivro($livro, $id_dono);
    }
    
    public function pesquisaLivro($titulo/*, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca*/){
       
        $listaLivros = Array();
        $listaLivrosMatriz = LivroDao:: pesquisaLivroDao($titulo/*, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca*/);
        
        return $listaLivrosMatriz;
    }
    
    public function getLivroById($id){
        $atributosLivro = LivroDao::getLivroById($id);
        $livro = LivroControlador::criaObjetoLivro($atributosLivro['titulo_livro'], $atributosLivro['autor'], 
                $atributosLivro['genero'], $atributosLivro['edicao'], $atributosLivro['editora'], $atributosLivro['venda'], 
                $atributosLivro['troca'], $atributosLivro['estado_conserv'], $atributosLivro['descricao_livro']);
        return $livro;
    }
    
    public function deletaLivro($idLivro){
        return LivroDao::deletaLivro($idLivro);
        }
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono, $id_usuario){
        if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        return LivroDao::alteraLivro($livro, $id_dono, $id_usuario);
    }
    
    public function getLivroByIdUsuario($idUsuario){
        return LivroDao::getLivroByIdUsuario($idUsuario);
    }
    
    public function getAllLivro($id_dono){
        return LivroDao::getAllLivro($id_dono);
    }
    
    public function criaObjetoLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao){
        $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        return $livro;
    }
}
