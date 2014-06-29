<?php

include '../Modelo/LivroFisico.php';
include '../Modelo/Livroeletronico.php';
include_once '../Dao/LivroFisicoDao.php';
include_once '../Dao/LivroEletronicoDao.php';
    
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $caminhoLivroEletronico, $id_dono){
        try{
            if(empty($caminhoLivroEletronico)){
                $livro = new LivroFisico($titulo, $autor, $genero, $edicao, $editora, $descricao,$venda, $troca, $estado);
                $livroFisicoDao = LivroFisicoDao::getInstance();
                $retorno = $livroFisicoDao->salvaLivro($livro, $id_dono);
            }else{
                $livro = new LivroEletronico($titulo, $autor, $genero, $edicao, $editora, $descricao,$caminhoLivroEletronico);
                $livroEletronicoDao = LivroEletronicoDao::getInstance();
                $retorno = $livroEletronicoDao->salvaLivro($livro, $id_dono);
            }
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='../Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        return $retorno;
    }
    
    public function pesquisaLivro($titulo){
        $livroDao = LivroDao::getInstance();
        
        $listaLivrosMatriz = $livroDao->pesquisaLivroDao($titulo);
        
        $livros = Array();
        
        foreach($listaLivrosMatriz as $livro){
            $livroObjeto = LivroControlador::criaObjetoLivro($livro['titulo_livro'], $livro['autor'], 
                $livro['genero'], $livro['edicao'], $livro['editora'], $livro['venda'], 
                $livro['troca'], $livro['estado_conserv'], $livro['descricao_livro']);
            array_push($livros, $livroObjeto);
        }

        return $livros;
    }
    
    public function getLivroById($id){
        
        $livroDao = LivroDao::getInstance();
        
        $atributosLivro = $livroDao->getLivroById($id);
        
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
            echo "<script>window.location='../Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        return LivroDao::alteraLivro($livro, $id_dono, $id_usuario);
    }
    
    public function recuperaLivroPorIdUsuario($idUsuario){
        $livroDao = LivroDao::getInstance();
        
        return $livroDao->recuperaLivroPorIdUsuarioDao($idUsuario);
    }
    
    public function pegaTodosLivros($id_dono){
        $livroDao = LivroDao::getInstance();
        
        return $livroDao->pegaTodosLivrosDao($id_dono);
    }
    
    public function criaObjetoLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao){
        $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        return $livro;
    }
}
