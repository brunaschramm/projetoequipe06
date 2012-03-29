<?php
class Fornecedor {
    private $nome;
    private $codigo;

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setCodigo($codigo) {
        $this->cogido = $codigo;
    }
    
    public function getCodigo(){
        return $this->Codigo;
    }
}
?>