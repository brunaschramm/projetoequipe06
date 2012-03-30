<?php
include_once ("../Banco/Banco.php");
include_once ("../Models/Loja.php");

class LojaDAO extends Loja {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
        $sql = "INSERT INTO tblojas06 (nome, endereco, email) values ('" . $this->getNome() . "', '" . $this->getEndereco() . "', '" . $this->getEmail() . "')";
        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
    
    public function excluir() {
        $sql = "DELETE FROM tblojas06 WHERE codigo=".$this->getCodigo();

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM tbloja ORDER BY nome";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();       
        
        for($i = 0; $i < $numeroLinhas; $i++){
            $array[] = pg_fetch_array($result);
        }               
        return $array;
    }
}

$loja = new LojaDAO();
?>
