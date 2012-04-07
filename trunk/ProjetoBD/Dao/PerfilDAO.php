<?php

include_once ("../Banco/Banco.php");
include_once ("../Models/Perfil.php");

class PerfilDAO extends Perfil {

    private $conexao;
    
    public function __construct() {
        $_SESSION["codigo"] = 6;
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
        $sql = "INSERT INTO tbperfis06 (ano, preco, cod_formato," .
                "cod_genero, cod_censura, regiao, cod_grupo, cod_loja, cod_produtora, cod_usuario)" .
                "values ('" . $this->getAno() . "','" . $this->getPreco() . "','" . $this->getFormato() .
                "','" . $this->getGenero() . "','" . $this->getCensura() . "','"
                . $this->getRegiao() . "','" . $this->getGrupo() . "','"
                . $this->getLoja() . "','" . $this->getProdutora() . "' , 6)";

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function inserirGosto($cod_produto) {
        include_once ("ProdutoDAO.php");
        $model = new ProdutoDAO();
        $aux = $model->getProduto($cod_produto);
        $produto = $aux[0];
        $sql = "INSERT INTO tbperfis06 (ano, preco, cod_formato," .
                "cod_genero, cod_censura, regiao, cod_grupo, cod_loja, cod_produtora, cod_usuario)" .
                "values (" . $produto["ano"] . "," . $produto["preco"] . "," . $produto["cod_formato"] .
                "," . $produto["cod_genero"] . "," . $produto["cod_censura"] . ","
                . $produto["regiao"] . "," . $produto["cod_grupo"] . ","
                . $produto["cod_loja"] . "," . $produto["cod_produtora"] . " , ".$_SESSION["codigo"].")";
        $result = pg_query($sql);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getAll() {
        $sql = "SELECT perfis.preco, perfis.ano, lojas.nome AS loja, produtoras.produtora,formatos.formato, 
                generos.genero, censuras.censura, perfis.regiao, grupos.grupo, perfis.codigo
                FROM tbperfis06 AS perfis INNER JOIN tbloja AS lojas ON perfis.cod_loja = lojas.codigo
                INNER JOIN tbprodutoras06 AS produtoras ON perfis.cod_produtora = produtoras.codigo
                INNER JOIN tbgeneros06 AS generos ON perfis.cod_genero = generos.codigo
                INNER JOIN tbformatostela06 AS formatos ON perfis.cod_formato = formatos.codigo
                INNER JOIN tbcensuras06 AS censuras ON perfis.cod_censura = censuras.codigo
                INNER JOIN tbgrupos06 AS grupos ON perfis.cod_grupo = grupos.codigo
                WHERE perfis.cod_usuario =" . $_SESSION["codigo"];

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    public function consultar($genero, $produtora, $ano, $preco, $formato, $censura, $regiao, $grupo, $loja) {
        $sql = "SELECT produtos.preco, produtos.ano, fabricantes.nome AS fabricante, 
            lojas.nome AS loja, produtoras.produtora,formatos.formato,  generos.genero,
            censuras.censura, produtos.regiao, grupos.grupo, fornecedores.nome AS fornecedor, produtos.codigo
            FROM tbprodutos06 AS produtos INNER JOIN tbfabricantes06 AS fabricantes ON produtos.cod_fabricante = fabricantes.codigo
            INNER JOIN tbloja AS lojas ON produtos.cod_loja = lojas.codigo
            INNER JOIN tbprodutoras06 AS produtoras ON produtos.cod_produtora = produtoras.codigo
            INNER JOIN tbgeneros06 AS generos ON produtos.cod_genero = generos.codigo
            INNER JOIN tbformatostela06 AS formatos ON produtos.cod_formato = formatos.codigo
            INNER JOIN tbcensuras06 AS censuras ON produtos.cod_censura = censuras.codigo
            INNER JOIN tbgrupos06 AS grupos ON produtos.cod_grupo = grupos.codigo
            INNER JOIN tbfornecedor as fornecedores ON produtos.cod_fornecedor = fornecedores.codigo
            WHERE 1 = 1";
        if ($formato != null) {
            $sql = $sql . " AND formatos.codigo = " . $formato;
        }
        if ($preco != null) {
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
        if ($regiao != null) {
            $sql = $sql . " AND produtos.regiao = " . $regiao;
        }
        if ($genero != null) {
            $sql = $sql . " AND generos.codigo = " . $genero;
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

}

$perfil = new PerfilDAO();
?>