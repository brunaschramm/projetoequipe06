<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AmigoDAO
 *
 * @author thiago
 */
include_once ("../Banco/Banco.php");
include_once ("../Models/Amigo.php");

class AmigoDAO extends Amigo {

    private $conexao;

    function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();                
    }

    
    public function salvar (){
        $usuario = new Usuario();
        $usuario = $this->getUsuario();
        
        $amigo = new Usuario();
        $amigo = $this->getAmigo();
        
        
        
//        $sql = "INSERT INTO tbamigos06 (cod_usuario, cod_amigo, nivel_amizade) values (".$usuario->getCodigo().", ".$amigo->getCodigo().", '".$this->getNivelAmizade()."')";
//        
//        $result = pg_query($sql);                
//        
//        if($result){
//            echo 'Amigos Agora';
//        }else{
//            echo 'Não Amigos';
//        }
    }
}

?>
