<?php

class Usuario {
    private $codigo;
    private $nome;
    private $cpf;
    private $email;
    private $apelido;
    
    public function __construct(){}
    
    public function setCodigo($codigo){
        $this->codigo = $codigo;
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
    
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setApelido($apelido){
        $this->apelido = $apelido;
    }
    
    public function getApelido(){
        return $this->apelido;
    }
}
?>