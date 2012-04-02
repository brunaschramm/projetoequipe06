<?php

include_once ("../Banco/Banco.php");
include_once ("../Models/Fornecedor.php");

class FornecedorDAO extends Fornecedor {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
        $sql = "INSERT INTO tbfornecedor (nome) VALUES ('" . $this->getNome() . "')";

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function excluir() {
        $sql = "DELETE FROM tbfornecedor WHERE codigo=" . $this->getCodigo();

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM tbfornecedor ORDER BY nome";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }

        return $array;
    }

    public function consultar($pesquisa) {
        $sql = "SELECT * FROM tbfornecedor WHERE nome LIKE '%".$pesquisa."%' ORDER BY nome";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }

        return $array;
    }
}
$fornecedor = new FornecedorDAO();
?>