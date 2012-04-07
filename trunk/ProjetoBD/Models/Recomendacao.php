<?php

class Recomendacao {

    private $codigo;
    private $cod_usuario;
    private $cod_amigo;
    private $cod_produto;

    public function __construct() {
        
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigoUsuario($codigo) {
        $this->cod_usuario = $codigo;
    }

    public function getCodigoUsuario() {
        return $this->cod_usuario;
    }

    public function setCodigoAmigo($codigo) {
        $this->cod_amigo = $codigo;
    }

    public function getCodigoAmigo() {
        return $this->cod_amigo;
    }
    
    public function setCodigoProduto($codigo) {
        $this->cod_produto = $codigo;
    }

    public function getCodigoProduto() {
        return $this->cod_produto;
    }
}
?>