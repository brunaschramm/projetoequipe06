<? session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Principal</title>
        <link href="estilos.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div class="container" align="center">
            <div id="top">
                <form action="" method="POST" name="dados">
                    <a href="NAOMEXEADM.php"><img src="../Imagens/dvdcabeca2.png" width="1205"/></a>
                    <table><tr><td height="2"/></tr></table>
                    <table align="" width="1205px" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1EEB4">
                        <? if ($_SESSION["admin"]) { ?>
                            <tr>
                                <td width="77%" height="35" align="right">
                                    <div class="sombraFab"><strong>Fabricante</strong>
                                        <div><strong><a id="cadastrarFab" href="NAOMEXEADM.php?flag=jfab">Fabricante</a></strong>
                                        </div></div>
                                    <div class="sombraLoja"><strong>Loja</strong>
                                        <div><strong><a id="cadastrarLoja" href="NAOMEXEADM.php?flag=jloj">Loja</a></strong>
                                        </div></div>
                                    <div class="sombraUsuario"><strong>Usuário</strong>
                                        <div><strong><a id="cadastrarUsuario" href="NAOMEXEADM.php?flag=juse">Usuário</a></strong>
                                        </div></div>
                                    <div class="sombraProduto"><strong>Produto</strong>
                                        <div><strong><a id="cadastrarProduto" href="NAOMEXEADM.php?flag=jpro">Produto</a></strong>
                                        </div></div>
                                    <div class="sombraFornecedor"><strong>Fornecedor</strong>
                                        <div><strong><a id="cadastrarFornecedor" href="NAOMEXEADM.php?flag=jfor">Fornecedor</a></strong>
                                        </div></div>
                                </td>
                            </tr>
                        <? } ?>

                        <tr>
                            <td width="" height="" bgcolor="#FFFFFF">
                                <table align="" width="1205px" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1EEB4">
                                    <tr>
                                        <td width="100px" height="40" bgcolor="#FFFFFF">
                                            <input type="submit" value="" size="" name="Submit2" class="buscar2"/>
                                        </td>
                                        <td width="1000" align="">
                                            <input name="busca" type="text" id="busca" size="100" align=""/>
                                        </td>

                                        <? if (isset($_SESSION['codigo'])) { ?>
                                            <td align="right" width="105">
                                                <a href="logout.php" class="login">logout</a>
                                            </td>
                                        <? } else if (!isset($_SESSION['codigo'])) { ?>
                                            <td align="right" width="105">
                                                <a href="NAOMEXEADM.php?flag=jlogin" class="login">login</a>
                                                &nbsp &nbsp
                                            </td>
                                            <div class="sombra"><strong>Cadastrar</strong>
                                                <div><strong><a id="cadastrar" href="NAOMEXEADM.php?flag=jcad">Cadastrar</a></strong>
                                                </div>
                                            </div>
                                        <? } ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div id="main">
                <?
                if (isset($_POST["Submit"]) || isset($_POST["Submit2"]) || isset($_GET["pg"])) {
                    include_once "inicio.php";
                } else if (isset($_GET["id"])) {
                    $_SESSION["idProduto"] = $_GET["id"];
                    session_commit();
                    include_once "detalhes.php";
                } else {
                    $page = (isset($_GET['flag'])) ? $_GET['flag'] : "home";
                    switch ($page) {
                        case "jlogin":
                            $page = "login.php";
                            break;
                        case "jcad":
                            $page = "cadastroUsuario.php";
                            break;
                        case "jfab":
                            $page = "fabricantes.php";
                            break;
                        case "jfor":
                            $page = "fornecedores.php";
                            break;
                        case "juse":
                            $page = "usuarios.php";
                            break;
                        case "jpro":
                            $page = "produtos.php";
                            break;
                        case "jloj":
                            $page = "lojas.php";
                            break;
                        default :
                            $page = "sessaoCliente.php";
                    }
                    include_once $page;
                }
                ?>
            </div>

            <div id="menu" align="left">
                <form action="" method="POST" name="dados">
                    <table bgcolor="#BFEFFF" align="" class="tabelas">
                        <tr>
                            <td>
                                <img src="../Imagens/dvdcol.png" width="158" height="31"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Título:
                                <br/>
                                <input name="titulo" type="text" id="titulo" size="14px">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gênero:
                                <br/>
                                <select name="genero" id="genero">
                                    <?php
                                    include_once ("../Dao/CaracteristicasDAO.php");
                                    $model = new CaracteristicasDAO();
                                    $generos = $model->getGeneros();
                                    $tam = count($generos);
                                    echo "<option value=\"\">Selecione</option>\n";
                                    for ($i = 0; $i < $tam; $i++) {
                                        $aux = $generos[$i];
                                        echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["genero"] . "</option>\n";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Preço:
                                <br/>
                                <select size="1" name="preco">
                                    <option selected value="">Selecione</option>
                                    <option value="1">até R$ 10,00</option>
                                    <option value="2">R$ 10,01 à R$ 20,00</option>
                                    <option value="3">R$ 20,01 à R$ 30,00</option>
                                    <option value="4">R$ 30,01 à R$ 40,00</option>
                                    <option value="5">R$ 40,01 à R$ 50,00</option>
                                    <option value="6">R$ 50,01 à R$ 60,00</option>
                                    <option value="7">R$ 60,01 à R$ 70,00</option>
                                    <option value="8">R$ 70,01 à R$ 80,00</option>
                                    <option value="9">R$ 80,01 à R$ 90,00</option>
                                    <option value="10">mais de R$ 90,01</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ano:
                                <br/>
                                <select name="ano" id="ano">
                                    <?php
                                    echo "<option value=\"\">Selecione</option>\n";
                                    for ($i = 2012; $i >= 1960; $i--) {
                                        echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                Loja:
                                <br/>
                                <select name="loja" id="loja">
                                    <?php
                                    include_once ("../Dao/LojaDAO.php");
                                    $model = new LojaDAO();
                                    $lojas = $model->getAll();
                                    $tam = count($lojas);
                                    echo "<option value=\"\">Selecione</option>\n";
                                    for ($i = 0; $i < $tam; $i++) {
                                        $aux = $lojas[$i];
                                        echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["nome"] . "</option>\n";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Produtora:
                                <br/>
                                <select name="produtora" id="produtora">
                                    <?php
                                    include_once ("../Dao/CaracteristicasDAO.php");
                                    $model = new CaracteristicasDAO();
                                    $produtores = $model->getProdutoras();
                                    $tam = count($produtores);
                                    echo "<option value=\"\">Selecione</option>\n";
                                    for ($i = 0; $i < $tam; $i++) {
                                        $aux = $produtores[$i];
                                        echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["produtora"] . "</option>\n";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr align="center">
                            <td align="center">
                                <input  name="Submit" type="submit" class="buscar" value="" size=""/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div id="footer">algo</div>
        </div>
    </body>
</html>
