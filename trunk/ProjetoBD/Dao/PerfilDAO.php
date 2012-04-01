<?php
include_once ("../Banco/Banco.php");
include_once ("../Models/Perfil.php");

class PerfilDAO extends Perfil {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
        $sql = "INSERT INTO tbperfis06 (ano, preco, cod_formato," .
                "cod_genero, cod_censura, regiao, cod_grupo, cod_loja, cod_produtora)" .
                "values ('".$this->getAno()."','".$this->getPreco()."','".$this->getFormato().
                "','".$this->getGenero()."','".$this->getCensura()."','"
                . $this->getRegiao()."','".$this->getGrupo()."','"
                .$this->getLoja()."','".$this->getProdutora()."')";

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

}

?>