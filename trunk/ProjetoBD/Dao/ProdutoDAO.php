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
        $sql = "INSERT INTO tbprodutos06 (descricao, titulo, ano, preco, cod_formato," .
                "cod_genero, cod_censura, regiao, cod_grupo, cod_fabricante, cod_loja, cod_fornecedor, cod_produtora)" .
                "values ('" . $this->getDescricao() . "', '" . $this->getTitulo() . "','" .
                $this->getAno() . "','" . $this->getPreco() . "','" . $this->getFormato() .
                "','" . $this->getGenero() . "','" . $this->getCensura() . "','"
                . $this->getRegiao() . "','" . $this->getGrupo() . "','" . $this->getFabricante() .
                "','" . $this->getLoja() . "','" . $this->getFornecedor() . "','" . $this->getProdutora() . "')";

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function excluir() {
        $sql = "DELETE FROM tbprodutos06 WHERE codigo=" . $this->getCodigo();

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getAll() {
        $sql = "SELECT tbprodutos06.imagem, tbprodutos06.titulo, tbprodutos06.descricao, tbprodutos06.preco, tbprodutos06.ano,
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

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function consultar($titulo, $preco, $ano, $genero, $fabricante, $loja, $fornecedor, $produtora, $formato, $censura, $regiao, $grupo) {
        $sql = "SELECT produtos.titulo, produtos.descricao, produtos.preco, produtos.ano,
            fabricantes.nome AS fabricante, lojas.nome AS loja, produtoras.produtora,formatos.formato, 
            generos.genero, censuras.censura, produtos.regiao, grupos.grupo, fornecedores.nome AS fornecedor, 
            produtos.codigo
            FROM tbprodutos06 AS produtos INNER JOIN tbfabricantes06 AS fabricantes ON produtos.cod_fabricante = fabricantes.codigo
            INNER JOIN tbloja AS lojas ON produtos.cod_loja = lojas.codigo
            INNER JOIN tbprodutoras06 AS produtoras ON produtos.cod_produtora = produtoras.codigo
            INNER JOIN tbgeneros06 AS generos ON produtos.cod_genero = generos.codigo
            INNER JOIN tbformatostela06 AS formatos ON produtos.cod_formato = formatos.codigo
            INNER JOIN tbcensuras06 AS censuras ON produtos.cod_censura = censuras.codigo
            INNER JOIN tbgrupos06 AS grupos ON produtos.cod_grupo = grupos.codigo
            INNER JOIN tbfornecedor as fornecedores ON produtos.cod_fornecedor = fornecedores.codigo
            WHERE 1 = 1";
        if ($titulo != "") {
            $sql = $sql . " AND produtos.titulo LIKE '%" . $titulo . "%'";
        }
        if ($formato != null) {
            $sql = $sql . " AND formatos.codigo = " . $formato;
        }
        if ($preco != null) {
            $sql = $sql . " AND produtos.preco = " . $preco;
        }
        if ($ano != null) {
            $sql = $sql . " AND produtos.ano = " . $ano;
        }
        if ($regiao != null) {
            $sql = $sql . " AND produtos.regiao = " . $regiao;
        }
        if ($genero != null) {
            $sql = $sql . " AND generos.codigo = " . $genero;
        }
        if ($fabricante != null) {
            $sql = $sql . " AND fabricantes.codigo = " . $fabricante;
        }
        if ($fornecedor != null) {
            $sql = $sql . " AND fornecedores.codigo = " . $fornecedor;
        }
        if ($censura != null) {
            $sql = $sql . " AND censuras.codigo = " . $censura;
        }
        if ($grupo != null) {
            $sql = $sql . " AND grupos.codigo = " . $grupo;
        }
        if ($loja != null) {
            $sql = $sql . " AND lojas.codigo = " . $loja;
        }
        if ($produtora != null) {
            $sql = $sql . " AND produtoras.codigo = " . $produtora;
        }
        $sql . " ORDER BY produtos.titulo";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function buscaAvancada($titulo, $genero, $preco, $ano, $loja, $produtora) {
        $sql = "SELECT produtos.imagem, produtos.titulo, produtos.descricao, produtos.preco, produtos.ano,
            fabricantes.nome AS fabricante, lojas.nome AS loja, produtoras.produtora,formatos.formato, 
            generos.genero, censuras.censura, produtos.regiao, grupos.grupo, fornecedores.nome AS fornecedor, 
            produtos.codigo
            FROM tbprodutos06 AS produtos INNER JOIN tbfabricantes06 AS fabricantes ON produtos.cod_fabricante = fabricantes.codigo
            INNER JOIN tbloja AS lojas ON produtos.cod_loja = lojas.codigo
            INNER JOIN tbprodutoras06 AS produtoras ON produtos.cod_produtora = produtoras.codigo
            INNER JOIN tbgeneros06 AS generos ON produtos.cod_genero = generos.codigo
            INNER JOIN tbformatostela06 AS formatos ON produtos.cod_formato = formatos.codigo
            INNER JOIN tbcensuras06 AS censuras ON produtos.cod_censura = censuras.codigo
            INNER JOIN tbgrupos06 AS grupos ON produtos.cod_grupo = grupos.codigo
            INNER JOIN tbfornecedor as fornecedores ON produtos.cod_fornecedor = fornecedores.codigo
            WHERE 1 = 1";
        if ($titulo != "") {
            $sql = $sql . " AND produtos.titulo LIKE '%" . $titulo . "%'";
        }
        if ($preco != null) {
//        <option value = "1">até R$ 10, 00</option>
//        <option value = "2">R$ 10, 01 à R$ 20, 00</option>
//        <option value = "3">R$ 20, 01 à R$ 30, 00</option>
//        <option value = "4">R$ 30, 01 à R$ 40, 00</option>
//        <option value = "5">R$ 40, 01 à R$ 50, 00</option>
//        <option value = "6">R$ 50, 01 à R$ 60, 00</option>
//        <option value = "7">R$ 60, 01 à R$ 70, 00</option>
//        <option value = "8">R$ 70, 01 à R$ 80, 00</option>
//        <option value = "9">R$ 80, 01 à R$ 90, 00</option>
//        <option value = "10">mais de R$ 90, 01</option>
            switch ($preco) {
                case '1':
                    $sql = $sql . " AND produtos.preco <= 10";
                    break;
                case '2':
                    $sql = $sql . " AND produtos.preco BETWEEN 10.01 AND 20";
                    break;
                case '3':
                    $sql = $sql . " AND produtos.preco BETWEEN 20.01 AND 30";
                    break;
                case '4':
                    $sql = $sql . " AND produtos.preco BETWEEN 30.01 AND 40";
                    break;
                case '5':
                    $sql = $sql . " AND produtos.preco BETWEEN 40.01 AND 50";
                    break;
                case '6':
                    $sql = $sql . " AND produtos.preco BETWEEN 50.01 AND 60";
                    break;
                case '7':
                    $sql = $sql . " AND produtos.preco BETWEEN 60.01 AND 70";
                    break;
                case '8':
                    $sql = $sql . " AND produtos.preco BETWEEN 70.01 AND 80";
                    break;
                case '9':
                    $sql = $sql . " AND produtos.preco BETWEEN 80.01 AND 90";
                    break;
                case '10':
                    $sql = $sql . " AND produtos.preco > 90";
                    break;
            }
        }
        
        if ($ano != null) {
            $sql = $sql . " AND produtos.ano = " . $ano;
        }
        if ($genero != null) {
            $sql = $sql . " AND generos.codigo = " . $genero;
        }
        if ($loja != null) {
            $sql = $sql . " AND lojas.codigo = " . $loja;
        }
        if ($produtora != null) {
            $sql = $sql . " AND produtoras.codigo = " . $produtora;
        }
        $sql . " ORDER BY produtos.titulo";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function buscaSimples($busca) {
        $sql = "SELECT produtos.titulo, produtos.descricao, produtos.preco, produtos.ano,
            fabricantes.nome AS fabricante, lojas.nome AS loja, produtoras.produtora,formatos.formato, 
            generos.genero, censuras.censura, produtos.regiao, grupos.grupo, fornecedores.nome AS fornecedor, 
            produtos.codigo
            FROM tbprodutos06 AS produtos INNER JOIN tbfabricantes06 AS fabricantes ON produtos.cod_fabricante = fabricantes.codigo
            INNER JOIN tbloja AS lojas ON produtos.cod_loja = lojas.codigo
            INNER JOIN tbprodutoras06 AS produtoras ON produtos.cod_produtora = produtoras.codigo
            INNER JOIN tbgeneros06 AS generos ON produtos.cod_genero = generos.codigo
            INNER JOIN tbformatostela06 AS formatos ON produtos.cod_formato = formatos.codigo
            INNER JOIN tbcensuras06 AS censuras ON produtos.cod_censura = censuras.codigo
            INNER JOIN tbgrupos06 AS grupos ON produtos.cod_grupo = grupos.codigo
            INNER JOIN tbfornecedor as fornecedores ON produtos.cod_fornecedor = fornecedores.codigo
            WHERE produtos.titulo LIKE '%" . $busca . "%' OR produtos.preco = " . $busca . " OR produtos.ano = " . $ano
                . " OR genero LIKE '%" . $genero . "%' OR loja LIKE '%" . $loja . "%' OR produtora LIKE '%" . $produtora . "%'"
                . " ORDER BY produtos.titulo";

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