<?php

include_once '../Modelo/LivroFisico.php';
include_once '../Modelo/LivroEletronico.php';
include_once '../Dao/LivroFisicoDao.php';
include_once '../Dao/LivroEletronicoDao.php';
    
class LivroControlador {
     
    //FACADE ENTRE LIVRO CONTROLADOR, AS DUAS DAOS DE LIVRO E O RESTO DO SISTEMA
    
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
        $livroFisicoDao = LivroFisicoDao::getInstance();
        $livroEletronicoDao = LivroeletronicoDao::getInstance();
        
        $listaLivrosFisicosMatriz = $livroFisicoDao->pesquisaLivro($titulo);
        $listaLivrosEletronicoMatriz = $livroEletronicoDao->pesquisaLivro($titulo);
        
        $livrosFisicos = Array();
        $livrosEletronicos = Array();
        $livros = Array();
        
        if(!empty($listaLivrosFisicosMatriz)){
            foreach($listaLivrosFisicosMatriz as $livro){
                $livroObjeto = LivroControlador::criaObjetoLivroFisico($livro['titulo_livro'], $livro['autor'], 
                $livro['genero'], $livro['edicao'], $livro['editora'], $livro['descricao_livro'], $livro['venda'], 
                $livro['troca'], $livro['estado_conserv']);

                array_push($livrosFisicos, $livroObjeto);
            }
        }
        
        if(!empty($listaLivrosEletronicoMatriz)){
            foreach($listaLivrosEletronicoMatriz as $livro){
                $livroObjeto = LivroControlador::criaObjetoLivroEletronico($livro['titulo_livro'], $livro['autor'], 
                $livro['genero'], $livro['edicao'], $livro['editora'], $livro['descricao_livro'], $livro['caminhoLivroEletronico']);

                array_push($livrosEletronicos, $livroObjeto);
            }
        }
        array_push($livros, $livrosFisicos);
        array_push($livros, $livrosEletronicos);
                
        //return $listaLivrosMatriz;
        return $livros;
    }
    
    public function getLivroById($id){
        
        $livroFisicoDao = LivroFisicoDao::getInstance();
        
        $atributosLivro = $livroFisicoDao->getLivroById($id);
        
        $livro = LivroControlador::criaObjetoLivroFisico($atributosLivro['titulo_livro'], $atributosLivro['autor'], 
                $atributosLivro['genero'], $atributosLivro['edicao'], $atributosLivro['editora'], $atributosLivro['venda'], 
                $atributosLivro['troca'], $atributosLivro['estado_conserv'], $atributosLivro['descricao_livro']);
        return $livro;
    }
    
    public function deletaLivro($idLivro){
        $livroFisicoDao = LivroFisicoDao::getInstance();
        
        $caminho = $livroFisicoDao->defineTipoLivro($idLivro);
        
        if(strcmp($caminho['caminhoLivroEletronico'], 'NSA') != 0){
            $retorno = unlink($caminho['caminhoLivroEletronico']);
        }
        
        return $livroFisicoDao->deletaLivro($idLivro) && $retorno;
    }

    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_livro){
        if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new LivroFisico($titulo, $autor, $genero, $edicao, $editora, $descricao, $venda, $troca, $estado);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='../Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        return LivroFisicoDao::alteraLivro($livro, $id_livro);
    }
    
    public function recuperaLivroPorIdUsuario($idUsuario){
        $livroFisicoDao = LivroFisicoDao::getInstance();
        return $livroFisicoDao->recuperaLivroPorIdUsuarioDao($idUsuario);
    }
    
    public function pegaTodosLivros($id_dono){
        $livroFisicoDao = LivroFisicoDao::getInstance();
        
        return $livroFisicoDao->pegaTodosLivrosDao($id_dono);
    }
    
    //GRASP CRIADOR-ESPECIALISTA
    
    public function criaObjetoLivroFisico($titulo, $autor, $genero, $edicao, $editora, $descricao, $venda, $troca, $estado){
        $livro = new LivroFisico($titulo, $autor, $genero, $edicao, $editora, $descricao, $venda, $troca, $estado);
        return $livro;
    }
    
    public function criaObjetoLivroEletronico($titulo, $autor, $genero, $edicao, $editora, $descricao, $caminhoDiretorio){
        $livro = new LivroEletronico($titulo, $autor, $genero, $edicao, $editora, $descricao, $caminhoDiretorio);
        return $livro;
    }
}
