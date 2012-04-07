<?php
include_once ("../Banco/Banco.php");
include_once ("../Models/Recomendacao.php");

class RecomendacaoDAO extends Recomendacao {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar($amigo, $usuario, $produto) {
        $amigo += 4;
        
        /* cod_usuario = $amigo (usuario que recebe/possui a recomendacao)
         * cod_amigo = $usuario (amigo que recomendou o produto)
         */
        $sql = "INSERT INTO tbrecomendacoes06 (cod_usuario, cod_amigo, cod_produto) values (" . $amigo . ", " . $usuario . ", " . $produto . ")";
        
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
$recomendacao = new RecomendacaoDAO();
?>