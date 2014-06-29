<?php

include_once 'Livro.php';

class LivroFisico extends Livro {
    
    private $venda;
    private $troca;
    private $estado;

    function __construct($titulo, $autor, $genero, $edicao, $editora, $descricao,$venda, $troca, $estado) {
        parent::__construct($titulo, $autor, $genero, $edicao, $editora, $descricao);
        $this->setVenda($venda);
        $this->setTroca($troca);
        $this->setEstado($estado);
    }

    public function getTroca() {
        return $this->troca;
    }

    public function setTroca($troca) {
        $this->troca = $troca;
    }
    
    public function getVenda() {
        return $this->venda;
    }

    public function setVenda($venda) {
        $this->venda = $venda;
    }
    
    public function getEstado() {   
        return $this->estado;
    }
   
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
}
