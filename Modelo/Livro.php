<?php

include_once '../Utilidades/ExcessaoNomeInvalido.php';
include_once '../Utilidades/ExcessaoTituloInvalido.php';
include_once '../Utilidades/ExcessaoEditoraInvalida.php';
include_once '../Utilidades/ValidaDados.php';

class Livro {
    
    private $titulo;
    private $autor;
    private $genero;
    private $edicao;
    private $editora;
    private $descricao;
    
    function __construct($titulo, $autor, $genero, $edicao, $editora, $descricao) {
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setGenero($genero);
        $this->setEdicao($edicao);
        $this->setEditora($editora);
        $this->setDescricao($descricao);
    }
    
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        if(!ValidaDados::validaCamposnulos($titulo)){
            throw new ExcessaoTituloInvalido("Titulo nao pode ser nulo!");
        }else{
            $this->titulo = $titulo;
        }
        //Nao tera tratamento de excessao, pois o titulo é pessoal e vai de cada autor, 
        //logo pode ter qualquer tipo de caracter que o autor desejar
    }

    public function getAutor() {
        return $this->autor;   
    }

    public function setAutor($autor) {
        if(!ValidaDados::validaCamposNulos($autor)){
            throw new ExcessaoNomeInvalido("O nome do Autor nao pode ser nulo!");
        }elseif(ValidaDados::validaNome($autor) == 1){
            throw new ExcessaoNomeInvalido("Nome do Autor contem caracteres invalidos!");
        }elseif(ValidaDados::validaNome($autor) == 2){
            throw new ExcessaoNomeInvalido("Nome do Autor contem espaços seguidos!");
        }else{
            $this->autor = $autor;
        }
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }
    
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function defineTiposDeGeneros() { //Genero por engenharia
        define("ENGENHARIA", "Engenharia", TRUE);
        define("SOFTWARE", "Engenharia de Software", TRUE);
        define("ELETRONICA", "Engenharia Eletronica", TRUE);
        define("ENERGIA", "Engenharia de Energia", TRUE);
        define("AUTOMOTIVA", "Engenharia Automotiva", TRUE);
        define("AEROESPACIAL", "Engenharia Aeroespacial", TRUE);
        
        return array(ENGENHARIA,SOFTWARE, ELETRONICA, ENERGIA, AUTOMOTIVA, AEROESPACIAL);
    }
    
    public function getEdicao() {
        return $this->edicao;
    }
    
    public function setEdicao($edicao){
        $this->edicao = $edicao;//Precisa validar entrada só de números
    }
    
    public function getEditora(){
        return $this->editora;
    }
    
    public function setEditora($editora){
        
        if(!ValidaDados::validaCamposNulos($editora)){
            throw new ExcessaoEditoraInvalida("A Editora do Livro nao pode ser nula!");
        }else{
            $this->editora = $editora;
        }
    }
  
}