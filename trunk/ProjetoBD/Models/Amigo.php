<?php

class Amigo {
    private $usuario;
    private $amigo;
    private $nivelAmizade;
    
    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getAmigo() {
        return $this->amigo;
    }

    public function setAmigo($amigo) {
        $this->amigo = $amigo;
    }

    public function getNivelAmizade() {
        return $this->nivelAmizade;
    }

    public function setNivelAmizade($nivelAmizade) {
        $this->nivelAmizade = $nivelAmizade;
    }
}
?>