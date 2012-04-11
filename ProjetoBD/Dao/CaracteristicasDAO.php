<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once ("../Banco/Banco.php");

class CaracteristicasDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function getFormatos() {
        $sql = "SELECT * FROM tbformatostela06 ORDER BY formato";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function getGeneros() {
        $sql = "SELECT * FROM tbgeneros06 ORDER BY genero";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

//    public function getGenerosPerfil() {
//        $_SESSION["codigo"] = 1;
//        $sql = "SELECT genero FROM tbgeneros06 WHERE genero NOT IN 
//                (SELECT generos.genero FROM (SELECT * FROM tbperfis06 AS perfis WHERE perfis.cod_usuario =".$_SESSION["codigo"].")
//                AS perfis INNER JOIN tbgeneros06 AS generos ON perfis.cod_genero = generos.codigo)";
//
//        $result = pg_query($sql);
//
//        $numeroLinhas = pg_num_rows($result);
//
//        $array = array();
//
//        for ($i = 0; $i < $numeroLinhas; $i++) {
//            $array[] = pg_fetch_array($result);
//        }
//        return $array;
//    }

    public function getCensuras() {
        $sql = "SELECT * FROM tbcensuras06 ORDER BY censura";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function getGrupos() {
        $sql = "SELECT * FROM tbgrupos06 ORDER BY grupo";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function getProdutoras() {
        $sql = "SELECT * FROM tbprodutoras06 ORDER BY produtora";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

}

$caracteristicas = new CaracteristicasDAO();
?>