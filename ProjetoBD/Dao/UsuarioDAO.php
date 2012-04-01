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

    public function excluir() {
        $sql = "DELETE FROM tbusuario WHERE codigo=" . $this->getCodigo();

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

        if (!$result) {
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

    public function getAll() {
        $sql = "SELECT * FROM tbusuario";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function getAmigos() {
        //$sql = "SELECT * FROM tbusuario";
        $sql = "SELECT * FROM tbusuario, tbamigos06 WHERE tbusuario.codigo = '" . $_SESSION['codigo'] . "' 
            AND tbamigos06.codigo = tbusuario.codigo";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function adicionarAmigo() {
        $sql = "SELECT * FROM tbusuario WHERE email = " . $_POST['email'];
        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        if ($numeroLinhas) {
            $sql = "INSERT INTO tbamigos06 (codigo, cod_amigo, nivel) values ('" . $_SESSION['codigo'] . "', '" . $result["codigo"] . "', '" . $this->getEmail() . "')";
            $result = pg_query($sql);
            for ($i = 0; $i < $numeroLinhas; $i++) {
                $array[] = pg_fetch_array($result);
            }
            return $array;
        }
        return false;
    }

    public function removerAmigo() {
        $sql = "DELETE FROM tbamigos06 WHERE codigo=" . $_SESSION['codigo']. "AND cod_amigo".$this->getCodigo();

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}

?>