<?php

include_once ("../Models/Loja.php");
include_once ("../banco/Banco.php");

class LojaDAO extends Loja{
    
    private $conexao;
    
    function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();        
    }
    
    public function salvar(){                    
        $sql = "INSERT INTO tblojas06 (nome, endereco, email) values ('".$this->getNome()."', '".$this->getEndereco()."', '".$this->getEmail()."')";
        $result = pg_query($sql);                                        
        
        if(!$result){            
            return false;
        }else{            
            return true;
        }                                               
    }
    
    public function gatAll(){
//        $sql = "SELECT * FROM tblojas06 ORDER BY nome";
//        
//        $result = pg_query($sql);            
//        
//        $numeroLinhas = pg_num_rows($result);
//        
//        $array = array();        
//        
//        for($i = 0; $i < $numeroLinhas; $i++){
//            $array[$i] = pg_fetch_array($result); //--------
//        }               
//                        
//        return $array;
    }
}
?>
