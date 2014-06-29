<?php

include_once 'Livro.php';

class LivroEletronico extends Livro{
    
    private $caminhoDiretorio;
    
    function __construct($titulo, $autor, $genero, $edicao, $editora, $descricao,$caminhoDiretorio) {
        parent::__construct($titulo, $autor, $genero, $edicao, $editora, $descricao);
        $this->setCaminhoDiretorio($caminhoDiretorio);
    }
    
    public function getCaminhoDiretorio() {
        return $this->caminhoDiretorio;
    }

    public function setCaminhoDiretorio($caminhoDiretorio) {
        $this->caminhoDiretorio = $caminhoDiretorio;
    }
}
