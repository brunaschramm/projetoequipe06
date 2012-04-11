<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once ("../Banco/Banco.php");
include_once ("../Models/Perfil.php");
include_once ("AmigoDAO.php");

class PerfilDAO extends Perfil {

    private $conexao;

    public function __construct() {
        $this->conexao = new Banco();
        $this->conexao->open();
    }

    public function salvar() {
        $sql = "INSERT INTO tbperfis06 (ano, preco, cod_formato," .
                "cod_genero, cod_censura, regiao, cod_grupo, cod_loja, cod_produtora, cod_usuario)" .
                "values ('" . $this->getAno() . "','" . $this->getPreco() . "','" . $this->getFormato() .
                "','" . $this->getGenero() . "','" . $this->getCensura() . "','"
                . $this->getRegiao() . "','" . $this->getGrupo() . "','"
                . $this->getLoja() . "','" . $this->getProdutora() . "' , ". $_SESSION["codigo"]. ")";

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

        if ($produto["preco"] <= 10) {
            $preco = 1;
        } else if ($produto["preco"] > 10 && $produto["preco"] <= 20) {
            $preco = 2;
        } else if ($produto["preco"] > 20 && $produto["preco"] <= 30) {
            $preco = 3;
        } else if ($produto["preco"] > 30 && $produto["preco"] <= 40) {
            $preco = 4;
        } else if ($produto["preco"] > 40 && $produto["preco"] <= 50) {
            $preco = 5;
        } else if ($produto["preco"] > 50 && $produto["preco"] <= 60) {
            $preco = 6;
        } else if ($produto["preco"] > 60 && $produto["preco"] <= 70) {
            $preco = 7;
        } else if ($produto["preco"] > 70 && $produto["preco"] <= 80) {
            $preco = 8;
        } else if ($produto["preco"] > 80 && $produto["preco"] <= 90) {
            $preco = 9;
        } else if ($produto["preco"] > 90) {
            $preco = 10;
        }

        $sql = "INSERT INTO tbperfis06 (ano, preco, cod_formato," .
                "cod_genero, cod_censura, regiao, cod_grupo, cod_loja, cod_produtora, cod_usuario)" .
                "values (" . $produto["ano"] . "," . $preco . "," . $produto["cod_formato"] .
                "," . $produto["cod_genero"] . "," . $produto["cod_censura"] . ","
                . $produto["regiao"] . "," . $produto["cod_grupo"] . ","
                . $produto["cod_loja"] . "," . $produto["cod_produtora"] . " , " . $_SESSION["codigo"] . ")";
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

    /*
     * Funcao que pega todos os perfis de determinado usuario
     */

    function getPerfis($codigo) {
        $sql = "SELECT * FROM tbperfis06 WHERE cod_usuario=" . $codigo;
        $result = pg_query($sql);
        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }

        return $array;
    }

    /*
     * Funcao que retorna o perfil(do usuario logado) mais parecido com o produto visualizado
     */

    public function getPerfilParecido($produto) {
        $perfis = $this->getPerfis($_SESSION["codigo"]);

        $tam = count($perfis);

        $distancias = array();

        for ($i = 0; $i < $tam; $i++) {
            $distancias[] = $this->distancia($produto, $perfis[$i]);
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

        /*
         * Pega a chave do primeiro elemento do array.
         * Ex.: [3] -> 4
         *      [1] -> 5
         *      [2] -> 6
         * Chave primeiro = 3
         */
        $chave_menor = key($distancias);

        return $perfis[$chave_menor];
    }

    /*
     * Funcao que retorna o perfil do amigo mais parecido com o perfil do usuario logado
     */

    public function getPerfilAmigo($perfil) {
        $modelAmigo = new AmigoDAO();
        $amigos = $modelAmigo->getAmigos();

        $tam = count($amigos);
        //$sql = "SELECT * FROM tbperfis06 WHERE cod_usuario IN (6,7)";
        if($tam) {
            $sql = "SELECT * FROM tbperfis06 WHERE cod_usuario IN (";
        
            for ($i = 0; $i < $tam; $i++) {
                $aux = $amigos[$i];
                $sql = $sql.$aux["cod_amigo"];
                if($i < $tam-1){
                    $sql = $sql.", ";
                }
            }
            $sql = $sql.")";
        }

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }

        $distancias = array();

        $tam = count($array);

        for ($i = 0; $i < $tam; $i++) {
            $distancias[] = $this->distancia($perfil, $array[$i]);
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

        /*
         * Pega a chave do primeiro elemento do array.
         * Ex.: [3] -> 4
         *      [1] -> 5
         *      [2] -> 6
         * Chave primeiro = 3
         */
        $chave_menor = key($distancias);

        return $array[$chave_menor];
    }

    function distancia($param, $param2) {
        if ($param["preco"] <= 10) {
            $preco = 1;
        } else if ($param["preco"] > 10 && $param["preco"] <= 20) {
            $preco = 2;
        } else if ($param["preco"] > 20 && $param["preco"] <= 30) {
            $preco = 3;
        } else if ($param["preco"] > 30 && $param["preco"] <= 40) {
            $preco = 4;
        } else if ($param["preco"] > 40 && $param["preco"] <= 50) {
            $preco = 5;
        } else if ($param["preco"] > 50 && $param["preco"] <= 60) {
            $preco = 6;
        } else if ($param["preco"] > 60 && $param["preco"] <= 70) {
            $preco = 7;
        } else if ($param["preco"] > 70 && $param["preco"] <= 80) {
            $preco = 8;
        } else if ($param["preco"] > 80 && $param["preco"] <= 90) {
            $preco = 9;
        } else if ($param["preco"] > 90) {
            $preco = 10;
        }

        return sqrt(pow(($preco - $param2["preco"]), 2) + pow(($param["ano"] - $param2["ano"]), 2)
                        + pow(($param["cod_loja"] - $param2["cod_loja"]), 2) + pow(($param["cod_produtora"] - $param2["cod_produtora"]), 2)
                        + pow(($param["cod_genero"] - $param2["cod_genero"]), 2) + pow(($param["cod_formato"] - $param2["cod_formato"]), 2)
                        + pow(($param["cod_censura"] - $param2["cod_censura"]), 2) + pow(($param["cod_grupo"] - $param2["cod_grupo"]), 2)
                        + pow(($param["regiao"] - $param2["regiao"]), 2));
    }

    public function getPerfisUsuario($codigo) {
        $sql = "SELECT perfis.preco, perfis.ano, lojas.nome AS loja, produtoras.produtora,formatos.formato, 
                generos.genero, censuras.censura, perfis.regiao, grupos.grupo, perfis.codigo
                FROM tbperfis06 AS perfis INNER JOIN tbloja AS lojas ON perfis.cod_loja = lojas.codigo
                INNER JOIN tbprodutoras06 AS produtoras ON perfis.cod_produtora = produtoras.codigo
                INNER JOIN tbgeneros06 AS generos ON perfis.cod_genero = generos.codigo
                INNER JOIN tbformatostela06 AS formatos ON perfis.cod_formato = formatos.codigo
                INNER JOIN tbcensuras06 AS censuras ON perfis.cod_censura = censuras.codigo
                INNER JOIN tbgrupos06 AS grupos ON perfis.cod_grupo = grupos.codigo
                WHERE perfis.cod_usuario =" . $codigo;

        $result = pg_query($sql);

        $numeroLinhas = pg_num_rows($result);

        $array = array();

        for ($i = 0; $i < $numeroLinhas; $i++) {
            $array[] = pg_fetch_array($result);
        }
        return $array;
    }

}

$modelPerfil = new PerfilDAO();
?>