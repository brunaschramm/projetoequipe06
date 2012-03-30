<?php
include_once ("../Banco/Banco.php");

class CaracteristicasDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function getFormatos() {
        $sql = "SELECT * FROM tbformatostela06 ORDER BY nome";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();       
        
        for($i = 0; $i < $numeroLinhas; $i++){
            $array[] = pg_fetch_array($result);
        }               
        return $array;
    }
    public function getCensura() {
        $sql = "SELECT * FROM tbcensuras06 ORDER BY nome";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();       
        
        for($i = 0; $i < $numeroLinhas; $i++){
            $array[] = pg_fetch_array($result);
        }               
        return $array;
    }
    
    public function getRegioes() {
        $sql = "SELECT * FROM tbregioes06 ORDER BY nome";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();       
        
        for($i = 0; $i < $numeroLinhas; $i++){
            $array[] = pg_fetch_array($result);
        }               
        return $array;
    }
    
    public function getGrupos() {
        $sql = "SELECT * FROM tbgrupo06 ORDER BY nome";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();       
        
        for($i = 0; $i < $numeroLinhas; $i++){
            $array[] = pg_fetch_array($result);
        }               
        return $array;
    }
}

$caracteristicas = new CaracteristicasDAO();
?>