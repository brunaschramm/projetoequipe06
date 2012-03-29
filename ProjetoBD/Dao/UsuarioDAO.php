<?php

include_once ("../Banco/Banco.php");
include_once ("../Models/Usuario.php");

class UsuarioDAO extends Usuario {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
        $sql = "INSERT INTO tbusuario (nome, cpf, email, apelido) values ('" . $this->getNome() . "', '" . $this->getCpf() . "', '" . $this->getEmail() . "', '" . $this->getApelido() . "')";

        echo $sql;

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function valida($email, $cpf) {
        $sql = "SELECT * FROM tbusuario WHERE email = '$email' AND cpf = '$cpf'";
        
        $result = pg_query($sql);
        
        if (!$result){
            return null;
        } else {
            session_start();
            $_SESSION[nome] = pg_result($result, 0, "NOME");
            $_SESSION[apelido] = pg_result($result, 0, "APELIDO");
            $_SESSION[email] = pg_result($result, 0, "EMAIL");
            $_SESSION[cpf] = pg_result($result, 0, "CPF");
            return $result;
        }
    }
}
?>