<?php
class Fornecedor {
    private $nome;
    private $codigo;
    
    function __construct() {}

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
}
?>