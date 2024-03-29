<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once ("../Banco/Banco.php");
include_once ("../Models/Amigo.php");

class AmigoDAO extends Amigo {

    private $conexao;

    function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar($cod_amigo, $nivel_amizade) {
        $sql = "INSERT INTO tbamigos06 (cod_usuario, cod_amigo, nivel_amizade) values (".$_SESSION["codigo"].", ".$cod_amigo.", '".$nivel_amizade."')";
        
        $result = pg_query($sql);                
        
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getAmigos() {
        $sql = "SELECT amigos.nivel_amizade, usuarios2.nome AS nome_usuario, usuarios2.codigo AS cod_usuario, usuarios2.cpf AS cpf_usuario,
                usuarios2.email as email_usuario, usuarios.nome AS nome_amigo, usuarios.codigo AS cod_amigo, 
                usuarios.cpf AS cpf_amigo, usuarios.email as email_amigo, usuarios2.apelido as apelido_usuario, usuarios.apelido as apelido_amigo
                FROM tbamigos06 AS amigos INNER JOIN tbusuario AS usuarios ON amigos.cod_amigo = usuarios.codigo
                INNER JOIN tbusuario AS usuarios2 ON amigos.cod_usuario = usuarios2.codigo
                WHERE usuarios2.codigo =" . $_SESSION["codigo"] . "ORDER BY nome_amigo";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }
}

$modelAmigo = new AmigoDAO();
?>