<?php

include_once ("../Banco/Banco.php");
include_once ("../Models/Amigo.php");

class AmigoDAO extends Amigo {

    private $conexao;

    function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
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

    public function getAmigos() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["codigo"] = 1;
        session_commit();

        $sql = "SELECT usuarios2.nome AS nome_usuario, usuarios2.codigo AS cod_usuario, usuarios2.cpf AS cpf_usuario,
                usuarios2.email as email_usuario, usuarios.nome AS nome_amigo, usuarios.codigo AS cod_amigo, 
                usuarios.cpf AS cpf_amigo, usuarios.email as email_amigo, usuarios2.apelido as apelido_usuario, usuarios.apelido as apelido_amigo
                FROM tbamigos06 AS amigos INNER JOIN tempusuarios AS usuarios ON amigos.cod_amigo = usuarios.codigo
                INNER JOIN tempusuarios AS usuarios2 ON amigos.cod_usuario = usuarios2.codigo
                WHERE usuarios2.codigo =1 ORDER BY nome_amigo";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }
}
$model = new AmigoDAO();
?>