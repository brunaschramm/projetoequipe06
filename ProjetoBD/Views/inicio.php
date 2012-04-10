<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sem título</title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <table width="100%" class="">
            <?
            include_once ("../Dao/ProdutoDAO.php");
            $model = new ProdutoDAO();
            if (isset($_POST["BuscaA"])) {
                $produtos = $model->buscaSimples($_POST["busca"]);
                $_SESSION["produtos"] = $produtos;
                session_commit();
            } else if (isset($_POST["Busca"])) {
                $produtos = $model->buscaAvancada($_POST["titulo"], $_POST["genero"], $_POST["preco"], $_POST["ano"], $_POST["loja"], $_POST["produtora"]);
                $_SESSION["produtos"] = $produtos;
                session_commit();
            } else if (isset($_GET["pg"])) {
                $produtos = $_SESSION["produtos"];
            }
            if (!$produtos) {
                echo "Nenhum produto encontrado!";
            } else {
                //================ Paginação ==============================
                $qntd = 12; // qntd de produtos exibidos por pagina
                $atual = (isset($_GET["pg"])) ? intval($_GET["pg"]) : 1;
                $pagproduto = array_chunk($produtos, $qntd);
                $totalPag = count($pagproduto);
                $result = $pagproduto[$atual - 1];
                //=========================================================

                $tam = count($result);
                echo "<tr><div>";
                for ($i = 0; $i < $tam; $i++) {
                    $aux = $result[$i];
                    ?>
                    <td align="center" width="200px">
                        <!--<a href="javascript:abrir('detalhes.php?id=<?echo $aux['codigo']?>');"><img src="../Imagens/loja.png" width="70" height="35"></a>-->
                        </br></br>
                        <div class="css do produto" id="">
                            <a href="sessaoCliente.php?id=<? echo $aux['codigo'] ?>" class="link">
                                <img src="../Imagens/Produtos/<? echo $aux["imagem"]; ?>" width="97" height="132"/>
                            </a>
                            </br>
                            <span class="link"><strong class=""><? echo $aux["titulo"]; ?></strong></span>
                            </a>
                            </br>
                        </div>
                    </td>
                    <?
                    if (($i + 1) % 4 == 0) {
                        echo "</div></tr><tr bordercolordark=\"#000000\"><td><br><br></td></tr><tr><div>";
                    }
                }
            }
            ?>
            </div></tr>
        </table>
        <table width="100%" class="">
            <?
            //================ Paginação ==============================
            echo "<tr align=\"center\"><div>";
            echo "<td align=\"center\">";
            if ($atual > 1) {
                echo "<a href=\"sessaoCliente.php?pg=" . ($atual - 1) . "\">ANT</a>\n";
            }
            if ($atual < $totalPag) {
                echo "\n<a href=\"sessaoCliente.php?pg=" . ($atual + 1) . "\">PROX</a>";
            }
            echo "</td></tr></div>";
            //=========================================================
            ?>
        </table>
    </body>
</html>