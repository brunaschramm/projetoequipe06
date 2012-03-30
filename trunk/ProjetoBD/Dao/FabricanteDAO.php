<?php

include_once ("../Banco/Banco.php");
include_once ("../Models/Fabricante.php");

class FabricanteDAO extends Fabricante {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
        $sql = "INSERT INTO tbfabricantes06 (fabricante, nacionalidade) VALUES ('" . $this->getNome() . "', '" . $this->getNacionalidade() . "')";

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
    
    public function excluir() {
        $sql = "DELETE FROM tbfabricantes06 WHERE codigo=".$this->getCodigo();

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM tbfabricantes06 ORDER BY fabricante";
        
        $result = pg_query($sql);
        
        $numeroLinhas = pg_num_rows($result);
        
        $array = array();

        for($i = 0; $i < $numeroLinhas; $i++){
            $array[] = pg_fetch_array($result);
        }               
                        
        return $array;
    }
}
$fabricante = new FabricanteDAO();
?>