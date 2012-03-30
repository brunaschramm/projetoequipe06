<?php
include_once ("../Banco/Banco.php");
include_once ("../Models/Loja.php");

class LojaDAO extends Loja {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {   
        $sql = "INSERT INTO tbprodutos (descricao, titulo, ano, preco, formato,
            genero, censura, regiao, grupo, fabricante, loja, fornecedor, produtora)
            values ('" . $this->getDescricao() . "', '" . $this->getTitulo() . "',
                '". $this->getAno() . "', '". $this->getPreco() . "', '". $this->getFormato() .
                "', '". $this->getGenero() . "', '". $this->getCensura() . "', '"
                .$this->getRegiao() . "', '". $this->getGrupo() . "', '". $this->getFabricante().
                "', '". $this->getLoja() . "', '". $this->getFornecedor() . "', '". $this->getProdutora(). "')";
        
        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
    
    public function excluir() {
        $sql = "DELETE FROM tbprodutos WHERE codigo=".$this->getCodigo();

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM tbprodutos ORDER BY nome";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();       
        
        for($i = 0; $i < $numeroLinhas; $i++){
            $array[] = pg_fetch_array($result);
        }               
        return $array;
    }
}
$loja = new LojaDAO();
?>