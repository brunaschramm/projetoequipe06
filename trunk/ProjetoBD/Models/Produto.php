<?php

class Produto {
    private $codigo;
    private $descricao;
    private $titulo;
    private $ano;
    private $preco;
    private $formato;
    private $genero;
    private $censura;
    private $regiao;
    private $grupo;
    private $fabricante;
    private $loja;
    private $fornecedor;
    private $produtora;
    
    public function setProdutora($produtora){
        $this->produtora = $produtora;
    }
    
    public function getProdutora(){
        return $this->produtora;
    }
    
    public function setFornecedor($fornecedor){
        $this->fornecedor = $fornecedor;
    }
    
    public function getFornecedor(){
        return $this->fornecedor;
    }
    
    public function setLoja($loja){
        $this->loja = $loja;
    }
    
    public function getLoja(){
        return $this->loja;
    }
    
    public function setFabricante($fabricante){
        $this->fabricante = $fabricante;
    }
    
    public function getFabricante(){
        return $this->fabricante;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setCodigo($novo) {
        $this->codigo = $novo;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setTitulo($novo){
        $this->titulo=$novo;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }
    public function setPreco($novo){
        $this->preco=$novo;
    }
    
    public function getPreco(){
        return $this->preco;
    }
    public function setAno($novo){
        $this->ano=$novo;
    }
    
    public function getAno(){
        return $this->ano;
    }
    public function setFormato($novo){
        $this->formato=$novo;
    }
    
    public function getFormato(){
        return $this->formato;
    }
    public function setGenero($novo){
        $this->genero=$novo;
    }
    
    public function getGenero(){
        return $this->genero;
    }
    public function setCensura($novo){
        $this->censura=$novo;
    }
    
    public function getCensura(){
        return $this->censura;
    }
    public function setRegiao($novo){
        $this->regiao=$novo;
    }
    
    public function getRegiao(){
        return $this->regiao;
    }
    public function setGrupo($novo){
        $this->grupo=$novo;
    }
    
    public function getGrupo(){
        return $this->grupo;
    }
}

?>
