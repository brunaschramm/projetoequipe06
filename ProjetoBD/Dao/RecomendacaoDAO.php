<?php

include_once ("../Banco/Banco.php");
include_once ("../Models/Recomendacao.php");

class RecomendacaoDAO extends Recomendacao {

    private $conexao;

    public function __construct() {
        session_start();
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar($amigo, $usuario, $produto) {
        /* cod_usuario = $amigo (usuario que recebe/possui a recomendacao)
         * cod_amigo = $usuario (amigo que recomendou o produto)
         */
        $sql = "INSERT INTO tbrecomendacoes06 (cod_usuario, cod_amigo, cod_produto) values (" . $amigo . ", " . $usuario . ", " . $produto . ")";

        $result = pg_query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getRecomendacoesUsuario($produto) {
        $sql = "SELECT produto.codigo, produto.imagem, produto.titulo, produto.descricao, produto.ano, produto.preco,
                produto.regiao, produto.cod_genero, genero.genero, produto.cod_produtora,
                produtora.produtora, produto.cod_loja, loja.nome AS loja, produto.cod_grupo,
                grupo.grupo, produto.cod_censura, censura.censura AS censura, produto.cod_formato,
                formato.formato, produto.cod_fabricante, fabricante.nome AS fabricante,
                produto.cod_fornecedor, fornecedor.nome AS fornecedor, recomendacao.cod_amigo,usuario.nome AS amigo
                FROM tbrecomendacoes06 AS recomendacao INNER JOIN tbprodutos06 AS produto ON recomendacao.cod_produto = produto.codigo
                INNER JOIN tbloja AS loja ON loja.codigo = produto.cod_loja
                INNER JOIN tbprodutoras06 AS produtora ON produtora.codigo = produto.cod_produtora
                INNER JOIN tbgeneros06 AS genero ON genero.codigo = produto.cod_genero
                INNER JOIN tbcensuras06 AS censura ON censura.codigo = produto.cod_censura
                INNER JOIN tbgrupos06 AS grupo ON grupo.codigo = produto.cod_grupo
                INNER JOIN tbformatostela06 AS formato ON formato.codigo = produto.cod_formato
                INNER JOIN tbfabricantes06 AS fabricante ON fabricante.codigo = produto.cod_fabricante
                INNER JOIN tbfornecedor AS fornecedor ON fornecedor.codigo = produto.cod_fornecedor
                INNER JOIN tbusuario AS usuario ON usuario.codigo = cod_amigo
                WHERE cod_usuario = ".$_SESSION["codigo"]. " AND produto.codigo <> ".$produto['codigo'];

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        
        $tam = count($array);
        
        $distancias = array();
        
        for($i = 0; $i < $tam; $i++){
            $distancias[] = $this->distancia($produto, $array[$i]);
        }
        
        /*
         *  Ordena as distancias e preserva os indices dos elementos.
         * Ex.: [0] -> 2
         *      [1] -> 1
         * Depois de ordenar:
         *      [1] -> 1
         *      [0] -> 2
         */
        asort($distancias);

        return $array;
    }

    function distancia($param, $param2) {
        return sqrt(pow(($param["preco"] - $param2["preco"]), 2) + pow(($param["ano"] - $param2["ano"]), 2)
                        + pow(($param["cod_loja"] - $param2["cod_loja"]), 2) + pow(($param["cod_produtora"] - $param2["cod_produtora"]), 2)
                        + pow(($param["cod_genero"] - $param2["cod_genero"]), 2) + pow(($param["cod_formato"] - $param2["cod_formato"]), 2)
                        + pow(($param["cod_censura"] - $param2["cod_censura"]), 2) + pow(($param["cod_grupo"] - $param2["cod_grupo"]), 2)
                        + pow(($param["regiao"] - $param2["regiao"]), 2));
    }
}

$recomendacao = new RecomendacaoDAO();
?>