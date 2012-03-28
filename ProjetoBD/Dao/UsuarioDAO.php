<?php

include_once ("../banco/Banco.php");
include_once ("../Models/Usuario.php");

class UsuarioDAO extends Usuario {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
        $sql = "INSERT INTO tbusuarios06 (nome, cpf, email, apelido) values ('" . $this->getNome() . "', '" . $this->getCpf() . "', '" . $this->getEmail() . "', '" . $this->getApelido() . "')";

        echo $sql;
        
        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}

?>
