<?php

class fabricante {
    private $codigo;
    private $nome;
    private $nacionalidade;
    
    public function setCodigo($nome){
        $this->codigo = $nome;
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNacionalidade($nacionalidade){
        $this->nacionalidade = $nacionalidade;        
    }
    
    public function getNacionalidade(){
        return $this->nacionalidade;
    }
}
?>
