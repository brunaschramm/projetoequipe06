<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Produto</title>
    </head>
    <body>
        <?php
        include_once ("../Dao/PerfilDAO.php");
        $modelPerfil = new PerfilDAO();
        include_once ("../Dao/ProdutoDAO.php");
        $model = new ProdutoDAO();
        $produto = $model->getProduto($_GET["id"]);
        if (!isset($_SESSION)) {
            session_start();
        }
        $aux = $produto[0];
        $_SESSION["produto"] = $aux;
        session_commit();
        ?>
        <table width=500 height=100>
            <tr>
                <td align="center">
                    <a href="../Controllers/PerfilController.php?acao=gostar&id=<? echo $aux['codigo']; ?>"><img src="../Imagens/gostar.png" width="35" height="35"></a>
                </td>
                <td align="center">
                    <a href="recomendar.php?id=<? echo $aux['codigo']; ?>"><img src="../Imagens/recomendar.jpg" width="35" height="35"></a>
                </td>
            </tr>
            </br></br>
            <tr>
                <td align = center>
                    <img src="../Imagens/Produtos/<? echo $aux['imagem']; ?>" width="97" height="132"/>
                </td>
                <td align = center>
                    <table>
                        <tr>
                            <td>
                                Título:
                            </td>
                            <td>
                                <? echo $aux['titulo']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gênero:
                            </td>
                            <td>
                                <? echo $aux['genero']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Produtora:
                            </td>
                            <td>
                                <? echo $aux['produtora']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ano:
                            </td>
                            <td>
                                <? echo $aux['ano']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Preço:
                            </td>
                            <td>
                                <? echo "R$" . $aux['preco']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Loja:
                            </td>
                            <td>
                                <? echo $aux['loja']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan = 2>
                    <? echo $aux['descricao']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                Sugerimos para você:
                            </td>
                        </tr>
                        <tr>
                            <?php
                            $perfil = $modelPerfil->getPerfilParecido($aux);
                            //print_r($perfil);
                            $amigo = $modelPerfil->getPerfilAmigo($perfil);
                            //print_r($amigo);
                            $recomendacoes = $model->getRecomendacoes($perfil, $amigo, $aux);
                            //print_r($recomendacoes);
                            $tam = count($recomendacoes); // Qntd de recomendacoes exibidas
                            if ($tam > 4)
                                $tam = 4;
                            echo "<tr><div>";
                            echo "tam ->" . $tam;
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $recomendacoes[$i];
                                ?>
                                <td align="center">
                                    <a href="javascript:abrir('detalhes.php?id=<?  echo $aux['codigo']      ?>');"><img src="../Imagens/loja.png" width="70" height="35"></a>
                                    <a href=""><img src="../Imagens/iraloja.png" width="90" height="35"></a>
                                    </br></br>
                                    <div class="css do produto" id="">
                                        <a href="link do produto" class="css de link">
                                            <img src="../Imagens/Produtos/<? echo $aux["imagem"];      ?>" width="97" height="132"/>
                                        </a>
                                        </br>
                                        <span class="link"><strong class=""><? echo $aux["titulo"];      ?></strong></span>
                                        </a>
                                        </br>
                                    </div>
                                </td>
                                <?
                                if (($i + 1) % 4 == 0) {
                                    echo "</div></tr><tr bordercolordark=\"#000000\"><td><br><br></td></tr><tr><div>";
                                }
                            }
                            ?>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>