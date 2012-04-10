<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Produto</title>
        <script language="JavaScript" >            
        </script>
    </head>
    <body>
        <?php
        session_commit();
        include_once ("../Dao/RecomendacaoDAO.php");
        $modelRecomendacao = new RecomendacaoDAO();
        include_once ("../Dao/PerfilDAO.php");
        $modelPerfil = new PerfilDAO();
        include_once ("../Dao/ProdutoDAO.php");
        $model = new ProdutoDAO();
        $produto = $model->getProduto($_SESSION["idProduto"]);
        $aux = $produto[0];
        $_SESSION["produto"] = $aux;
        session_commit();
        ?>
        <table width=500 height=100 align = center>
            <? if (isset($_SESSION["codigo"])) { ?>
                <tr>
                    <td align="center">
                        <a href="../Controllers/PerfilController.php?acao=gostar&id=<? echo $aux['codigo']; ?>"><img src="../Imagens/gostar.png" width="35" height="35"></a>
                    </td>
                    <td align="center">
                        <a href="recomendar.php?id=<? echo $aux['codigo']; ?>"><img src="../Imagens/recomendar.jpg" width="35" height="35"></a>
                    </td>
                </tr>
            <? } ?>
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
                        <tr>
                            <td>
                                Grupo:
                            </td>
                            <td>
                                <? echo $aux['grupo']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Censura:
                            </td>
                            <td>
                                <? echo $aux['censura']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Formato:
                            </td>
                            <td>
                                <? echo $aux['formato']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Região:
                            </td>
                            <td>
                                <? echo $aux['regiao']; ?>
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
        <!-- Área somente para usuários logados -->
        <?php
        session_start();
        if (isset($_SESSION['codigo'])) {
            ?>  
            <table width="100%" align = center>
                <tr>
                    <td align = center>
                        Sugerimos a você:
                    </td>
                </tr>
                <tr>
                    <?php
                    $perfil = $modelPerfil->getPerfilParecido($aux);
                    $amigo = $modelPerfil->getPerfilAmigo($perfil);
                    if ($perfil && $amigo) {
                        //echo "1";
                        $sugestoes = $model->getRecomendacoes($perfil, $amigo, $aux, 1);
                    } else if (!$perfil && $amigo){
                        $sugestoes = $model->getRecomendacoes($aux, $amigo, $aux, 2);
                        //echo "2";
                    } else if ($perfil && !$amigo){
                        $sugestoes = $model->getRecomendacoes($perfil, $aux, $aux, 3);
                        //echo "3";
                    } else if (!$perfil && !$amigo) {
                        $sugestoes = $model->getRecomendacoes($aux, $aux, $aux, 4);
                        //echo "4";
                    }
                    $tam = count($sugestoes); // Qntd de sugestoes exibidas
                    
                    if ($tam > 4)
                        $tam = 4;
                    for ($i = 0; $i < $tam; $i++) {
                        $aux = $sugestoes[$i];
                        ?>
                        <td align="center">
                            <table>
                                <tr height="20%">
                                    <td align = center width= "200px">
                                        <a href="sessaoCliente.php?id=<? echo $aux['codigo'] ?>"><img src="../Imagens/loja.png" width="70" height="35"></a>
                                        <a href=""><img src="../Imagens/iraloja.png" width="90" height="35"></a>
                                        </br></br>
                                    </td>
                                </tr>
                                <tr height="80%">
                                    <td align = center>
                                        <div class="css do produto" id="">
                                            <a href="link do produto" class="css de link">
                                                <img src="../Imagens/Produtos/<? echo $aux["imagem"]; ?>" width="97" height="132"/>
                                            </a>
                                            </br>
                                            <span class="link"><strong class=""><? echo $aux["titulo"]; ?></strong></span>
                                            </br>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    <? } ?>
                </tr>
            </table>
            <?
            $recomendacoes = $modelRecomendacao->getRecomendacoesUsuario($aux);
            $tam = count($recomendacoes); // Qntd de recomendacoes exibidas
            if ($tam) {
                ?>       
                <table width="100%" align = center>
                    <tr>
                        <td align = center>
                            Recomendações para você:
                        </td>
                    </tr>
                    <tr>
                        <?php
                        if ($tam > 4)
                            $tam = 4;
                        for ($i = 0; $i < $tam; $i++) {
                            $aux = $recomendacoes[$i];
                            ?>
                            <td align="center">
                                <table>
                                    <tr height="20%">
                                        <td align = center width= "200px">
                                            <a href="sessaoCliente.php?id=<? echo $aux['codigo'] ?>"><img src="../Imagens/loja.png" width="70" height="35"></a>
                                            <a href=""><img src="../Imagens/iraloja.png" width="90" height="35"></a>
                                            </br></br>
                                        </td>
                                    </tr>
                                    <tr height="80%">
                                        <td align = center>
                                            <div class="css do produto" id="">
                                                <a href="link do produto" class="css de link">
                                                    <img src="../Imagens/Produtos/<? echo $aux["imagem"]; ?>" width="97" height="132"/>
                                                </a>
                                                </br>
                                                <span class="link"><strong class=""><? echo $aux["titulo"]; ?></strong></span>
                                                </br>
                                                <span class="link"><strong class="">Por:<? echo $aux["amigo"]; ?></strong></span>
                                                </br>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        <? } ?>
                    </tr>
                </table>
            <? }
        }
        ?>
    </body>
</html>