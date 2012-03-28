<?php

include_once ("../banco/Banco.php");
include_once ("../Models/Fabricante.php");

class FabricanteDAO extends Fabricante {
    private $conexao;
    
    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }
    
    public function salvar(){
        $sql = "INSERT INTO tbfabricantes06 (nome, nacionalidade) values ('".$this->getNome()."', '".$this->getNacionalidade()."')";
        
        $result = pg_query($sql);
        
        if(!$result){
            return false;
        }else{
            return true;
        }        
    }   
}

?>
