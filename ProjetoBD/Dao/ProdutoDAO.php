<?php
include_once ("../Banco/Banco.php");
include_once ("../Models/Produto.php");

class ProdutoDAO extends Produto {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {   
        $sql = "INSERT INTO tbprodutos06 (descricao, titulo, ano, preco, cod_formato,".
            "cod_genero, cod_censura, regiao, cod_grupo, cod_fabricante, cod_loja, cod_fornecedor, cod_produtora)".
            "values ('" . $this->getDescricao() . "', '" . $this->getTitulo() . "','".
                $this->getAno()."','".$this->getPreco()."','".$this->getFormato().
                "','".$this->getGenero()."','".$this->getCensura()."','"
                .$this->getRegiao()."','".$this->getGrupo()."','".$this->getFabricante().
                "','". $this->getLoja()."','".$this->getFornecedor()."','".$this->getProdutora()."')";
        
        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
    
    public function excluir() {
        $sql = "DELETE FROM tbprodutos06 WHERE codigo=".$this->getCodigo();

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getAll() {
//        $sql = "SELECT * FROM tbprodutos06 ORDER BY titulo";
        $sql = "SELECT tbprodutos06.titulo, tbprodutos06.descricao, tbprodutos06.preco, tbprodutos06.ano,
                tbfabricantes06.nome AS fabricante, tbloja.nome AS loja, tbprodutoras06.produtora,
                tbformatostela06.formato, tbgeneros06.genero, tbcensuras06.censura, tbprodutos06.regiao,
                tbgrupos06.grupo, tbfornecedor.nome AS fornecedor, tbprodutos06.codigo
                FROM tbprodutos06, tbgeneros06, tbfabricantes06, tbfornecedor, tbcensuras06,
                tbformatostela06, tbgrupos06, tbloja, tbprodutoras06
                WHERE tbprodutos06.cod_genero = tbgeneros06.codigo
                AND tbprodutos06.cod_fabricante = tbfabricantes06.codigo
                AND tbprodutos06.cod_fornecedor = tbfornecedor.codigo
                AND tbprodutos06.cod_censura = tbcensuras06.codigo
                AND tbprodutos06.cod_formato = tbformatostela06.codigo
                AND tbprodutos06.cod_grupo = tbgrupos06.codigo
                AND tbprodutos06.cod_loja = tbloja.codigo
                AND tbprodutos06.cod_produtora = tbprodutoras06.codigo ORDER BY tbprodutos06.titulo";
        
        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();       
        
        for($i = 0; $i < $numeroLinhas; $i++){
            $array[] = pg_fetch_array($result);
        }               
        return $array;
    }
    
    public function consultar($titulo, $preco, $ano, $genero, $fabricante, $loja, $fornecedor, $produtora, $formato, $censura, $regiao, $grupo) {
        $sql = "SELECT tbprodutos06.titulo, tbprodutos06.descricao, tbprodutos06.preco, tbprodutos06.ano,
                tbfabricantes06.nome AS fabricante, tbloja.nome AS loja, tbprodutoras06.produtora,
                tbformatostela06.formato, tbgeneros06.genero, tbcensuras06.censura, tbprodutos06.regiao,
                tbgrupos06.grupo, tbfornecedor.nome AS fornecedor, tbprodutos06.codigo
                FROM tbprodutos06, tbgeneros06, tbfabricantes06, tbfornecedor, tbcensuras06,
                tbformatostela06, tbgrupos06, tbloja, tbprodutoras06
                WHERE  tbprodutos06.titulo LIKE '%".$titulo."%'
                AND tbprodutos06.preco = ".$preco."
                AND tbprodutos06.ano = ".$ano."
                AND tbprodutos06.cod_genero = tbgeneros06.codigo = ".$genero."
                AND tbprodutos06.cod_fabricante = tbfabricantes06.codigo = ".$fabricante."
                AND tbprodutos06.cod_fornecedor = tbfornecedor.codigo = ".$fornecedor."
                AND tbprodutos06.cod_censura = tbcensuras06.codigo = ".$censura."
                AND tbprodutos06.cod_formato = tbformatostela06.codigo = ".$formato."
                AND tbprodutos06.cod_grupo = tbgrupos06.codigo = ".$grupo."
                AND tbprodutos06.cod_loja = tbloja.codigo = ".$loja."
                AND tbprodutos06.cod_produtora = tbprodutoras06.codigo = ".$produtora."ORDER BY tbprodutos06.titulo";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }

        return $array;
    }
}
$produto = new ProdutoDAO();
?>