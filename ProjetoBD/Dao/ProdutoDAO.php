<?php
if (!isset($_SESSION)) {
    session_start();
}
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

    public function getProduto($codigo) {
        $sql = "SELECT produtos.codigo, produtos.imagem, produtos.descricao, produtos.titulo, produtos.ano, produtos.preco, lojas.nome AS loja, generos.genero,
                produtoras.produtora, formatos.formato, grupos.grupo, censuras.censura, produtos.regiao,
                lojas.codigo as cod_loja, generos.codigo AS cod_genero, produtoras.codigo AS cod_produtora,
                grupos.codigo AS cod_grupo, formatos.codigo AS cod_formato, censuras.codigo AS cod_censura
                FROM tbprodutos06 AS produtos INNER JOIN tbgeneros06 AS generos ON produtos.cod_genero = generos.codigo
                INNER JOIN tbprodutoras06 AS produtoras ON produtos.cod_produtora = produtoras.codigo
                INNER JOIN tbloja AS lojas ON produtos.cod_loja = lojas.codigo
                INNER JOIN tbgrupos06 AS grupos ON produtos.cod_grupo = grupos.codigo
                INNER JOIN tbformatostela06 AS formatos ON produtos.cod_formato = formatos.codigo
                INNER JOIN tbcensuras06 AS censuras ON produtos.cod_censura = censuras.codigo
                WHERE produtos.codigo =" . $codigo;

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
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
            $sql = $sql . " AND upper(produtos.titulo) LIKE upper('%" . $titulo . "%')";
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
        $sql = "SELECT produtos.codigo, produtos.imagem, produtos.titulo, produtos.descricao, produtos.preco, produtos.ano,
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
                WHERE upper(produtos.titulo) LIKE upper('%" . $busca . "%') OR upper(genero) LIKE upper('%" . $busca . "%')
                OR upper(lojas.nome) LIKE upper('%" . $busca . "%') OR upper(produtora) LIKE upper('%" . $busca . "%')
                ORDER BY produtos.titulo";

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    /*
     * Função que recomenda os produtos a partir das diferenças entre
     * o perfil do usuario logado e o perfil do amigo mais parecido com ele
     */

    public function getRecomendacoes($perfil, $amigo, $produto, $caso) {
        $diferenca = false;

        switch ($caso) {
                case 1:
                    $preco1 = $perfil["preco"];
                    $preco2 = $amigo["preco"];
                    break;
                case 2:
                    $preco1 = $this->getFaixaPreco($perfil["preco"]);
                    $preco2 = $amigo["preco"];
                    break;
                case 3:
                    $preco1 = $perfil["preco"];
                    $preco2 = $this->getFaixaPreco($amigo["preco"]);
                    break;
                case 4:
                    $preco1 = $this->getFaixaPreco($perfil["preco"]);
                    $preco2 = $this->getFaixaPreco($amigo["preco"]);
                    break;
        }
        
        $sql = "SELECT * FROM tbprodutos06 WHERE (1=0";

        if (($preco1 != $preco2)) {
            $diferenca = true;
            switch ($preco2) {
                case '1':
                    $sql = $sql . " OR preco <= 10";
                    break;
                case '2':
                    $sql = $sql . " OR preco BETWEEN 10.01 AND 20";
                    break;
                case '3':
                    $sql = $sql . " OR preco BETWEEN 20.01 AND 30";
                    break;
                case '4':
                    $sql = $sql . " OR preco BETWEEN 30.01 AND 40";
                    break;
                case '5':
                    $sql = $sql . " OR preco BETWEEN 40.01 AND 50";
                    break;
                case '6':
                    $sql = $sql . " OR preco BETWEEN 50.01 AND 60";
                    break;
                case '7':
                    $sql = $sql . " OR preco BETWEEN 60.01 AND 70";
                    break;
                case '8':
                    $sql = $sql . " OR preco BETWEEN 70.01 AND 80";
                    break;
                case '9':
                    $sql = $sql . " OR preco BETWEEN 80.01 AND 90";
                    break;
                case '10':
                    $sql = $sql . " OR preco > 90";
                    break;
            }
        }

        if ($perfil["ano"] != $amigo["ano"]) {
            $diferenca = true;
            $sql = $sql . " OR ano =" . $amigo["ano"];
        }
        if ($perfil["cod_loja"] != $amigo["cod_loja"]) {
            $diferenca = true;
            $sql = $sql . " OR cod_loja =" . $amigo["cod_loja"];
        }
        if ($perfil["cod_produtora"] != $amigo["cod_produtora"]) {
            $diferenca = true;
            $sql = $sql . " OR cod_produtora =" . $amigo["cod_produtora"];
        }
        if ($perfil["cod_genero"] != $amigo["cod_genero"]) {
            $diferenca = true;
            $sql = $sql . " OR cod_genero =" . $amigo["cod_genero"];
        }
        if ($perfil["cod_formato"] != $amigo["cod_formato"]) {
            $diferenca = true;
            $sql = $sql . " OR cod_formato =" . $amigo["cod_formato"];
        }
        if ($perfil["cod_censura"] != $amigo["cod_censura"]) {
            $diferenca = true;
            $sql = $sql . " OR cod_censura =" . $amigo["cod_censura"];
        }
        if ($perfil["cod_grupo"] != $amigo["cod_grupo"]) {
            $diferenca = true;
            $sql = $sql . " OR cod_grupo =" . $amigo["cod_grupo"];
        }
        if ($perfil["regiao"] != $amigo["regiao"]) {
            $diferenca = true;
            $sql = $sql . " OR regiao =" . $amigo["regiao"];
        }
        /*
         * Se não houver diferenca entre os perfis,
         * seleciona produtos similares com base nas principais características:
         * Genero, Loja, Produtora, Grupo e Ano
         */
        if (!$diferenca) {
            $sql = $sql . " OR ano =" . $amigo["ano"] . " OR cod_loja=" . $amigo["cod_loja"]
                    . " OR cod_produtora=" . $amigo["cod_produtora"] . " OR cod_genero=" . $amigo["cod_genero"]
                    . " OR cod_grupo=" . $amigo["cod_grupo"];
        }
        $sql = $sql . ") AND codigo <> " . $produto["codigo"];

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

    private function getFaixaPreco($preco){
        if ($preco <= 10) {
            $preco = 1;
        } else if ($preco > 10 && $preco <= 20) {
            $preco = 2;
        } else if ($preco > 20 && $preco <= 30) {
            $preco = 3;
        } else if ($preco > 30 && $preco <= 40) {
            $preco = 4;
        } else if ($preco > 40 && $preco <= 50) {
            $preco = 5;
        } else if ($preco > 50 && $preco <= 60) {
            $preco = 6;
        } else if ($preco > 60 && $preco <= 70) {
            $preco = 7;
        } else if ($preco > 70 && $preco <= 80) {
            $preco = 8;
        } else if ($preco > 80 && $preco <= 90) {
            $preco = 9;
        } else if ($preco > 90) {
            $preco = 10;
        }
        return $preco;
    }
}

$model = new ProdutoDAO();
?>