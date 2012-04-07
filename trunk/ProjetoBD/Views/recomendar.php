<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Produto</title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        $produto = $_SESSION["produto"];
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
        <form action="../Controllers/RecomendacaoController.php?acao=recomendar" name="dados" method="POST" >
            <table>
                <tr>
                    <td>
                        Recomendar para:
                    </td>
                </tr>
                <?
                include_once ("../Dao/AmigoDAO.php");
                $model = new AmigoDAO();
                $amigos = $model->getAmigos();
                $tam = count($amigos);
                for ($i = 0; $i < $tam; $i++) {
                    $aux = $amigos[$i];
                    echo "<tr><td><input type=\"checkbox\" name=\"amigo[]\" value=\"" . $aux["cod_amigo"] . "\">" . $aux["nome_amigo"] . "</td></tr>";
                }
                ?>
                <tr>
                    <td>
                        <input type="submit" name="recomendar" value="Recomendar"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>