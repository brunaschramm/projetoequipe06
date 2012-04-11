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
        $prod = $produto[0];
        $_SESSION["produto"] = $prod;
        session_commit();
        ?>
        <table width=500 height=100 align = center>
            <? if (isset($_SESSION["codigo"])) { ?>
                <tr>
                    <td align="center">
                        <a href="../Controllers/PerfilController.php?acao=gostar&id=<? echo $prod['codigo']; ?>"><img src="../Imagens/gostar.png" width="35" height="35"></a>
                    </td>
                    <td align="center">
                        <a href="sessaoCliente.php?flag=jrec"><img src="../Imagens/recomendar.jpg" width="35" height="35"></a>
                    </td>
                </tr>
            <? } ?>
            </br></br>
            <tr>
                <td align = center>
                    <img src="../Imagens/Produtos/<? echo $prod['imagem']; ?>" width="97" height="132"/>
                </td>
                <td align = center>
                    <table>
                        <tr>
                            <td>
                                Título:
                            </td>
                            <td>
                                <? echo $prod['titulo']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gênero:
                            </td>
                            <td>
                                <? echo $prod['genero']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Produtora:
                            </td>
                            <td>
                                <? echo $prod['produtora']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ano:
                            </td>
                            <td>
                                <? echo $prod['ano']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Preço:
                            </td>
                            <td>
                                <? echo "R$" . $prod['preco']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Loja:
                            </td>
                            <td>
                                <? echo $prod['loja']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Grupo:
                            </td>
                            <td>
                                <? echo $prod['grupo']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Censura:
                            </td>
                            <td>
                                <? echo $prod['censura']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Formato:
                            </td>
                            <td>
                                <? echo $prod['formato']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Região:
                            </td>
                            <td>
                                <? echo $prod['regiao']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan = 2>
                    <? echo $prod['descricao']; ?>
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
                    <td>
                        Sugerimos a você:
                    </td>
                </tr>
                <tr>
                    <?php
                    $perfil = $modelPerfil->getPerfilParecido($prod);
                    $amigo = $modelPerfil->getPerfilAmigo($perfil);
                    if ($perfil && $amigo) {
                        //echo "1";
                        $sugestoes = $model->getRecomendacoes($perfil, $amigo, $prod, 1);
                    } else if (!$perfil && $amigo){
                        $sugestoes = $model->getRecomendacoes($prod, $amigo, $prod, 2);
                        //echo "2";
                    } else if ($perfil && !$amigo){
                        $sugestoes = $model->getRecomendacoes($perfil, $prod, $prod, 3);
                        //echo "3";
                    } else if (!$perfil && !$amigo) {
                        $sugestoes = $model->getRecomendacoes($prod, $prod, $prod, 4);
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
                                <tr>
                                    <td align = center>
                                        <div class="css do produto" id="">
                                            <a href="sessaoCliente.php?id=<? echo $aux['codigo'] ?>" class="link">
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
            $recomendacoes = $modelRecomendacao->getRecomendacoesUsuario($prod);
            $tam = count($recomendacoes); // Qntd de recomendacoes exibidas
            if ($tam) {
                ?>       
                <table width="100%" align = center>
                    <tr>
                        <td>
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
                                    <tr>
                                        <td align = center>
                                            <div class="css do produto" id="">
                                                <a href="sessaoCliente.php?id=<? echo $aux['codigo'] ?>" class="link">
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