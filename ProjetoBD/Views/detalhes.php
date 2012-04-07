<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Produto</title>
    </head>
    <body>
        <?php
        include_once ("../Dao/ProdutoDAO.php");
        $model = new ProdutoDAO();
        $produto = $model->getProduto($_GET["id"]);
        $aux = $produto[0];
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
        </table>
    </body>
</html>