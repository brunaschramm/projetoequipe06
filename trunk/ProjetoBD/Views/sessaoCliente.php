
<? session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Principal</title>

        <style>
            .conteudo {
                background-image: url(../JPEG/conteudo.gif);
                background-repeat: no-repeat;
            }
            .barradobanner {
                background-image: url(../JPEG/banner/images/banner_calouro_05.jpg);
                background-repeat: no-repeat;
            }
            .texto {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 11px;
                color: #000000;
            }
            .botao {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 20px ;
                background-color: #D1EEB4;
                border: 1px solid #333333;
            }



            .meuselect {
                width:135px; /* Largura da janela do menu */
                background:#F0FFF0; /* Cor do fundo do menu
                em repouso */
                font:11px arial, helvetica,
                    sans-serif; /* Tamanho e tipo das letras */
                color:#36648B; /* Cor das letras do Título do menu */
            }
            .meuselect option.stit {
                width:135px; /* Largura da janela do menu para NN */
                background-color:#C1CDCD; /* Cor do fundo dos
                Subtítulos */
                color:#003366; /* Cor das letras dos Subtítulos */
            }
            .sep {
                width:135px;  /* Largura da janela do menu para NN */
                background-color:#FFFFFF; /* Cor do fundo dos
                separadores */
                color:#000000; /* Cor dos traços dos separadores */
            }
            .meuselect option.impar {
                width:135px; /* Largura da janela do menu para NN */
                background-color:#E0EEE0; /* Cor do fundo dos
                links impares */
                color:#00008B; /* Cor das letras dos links impares */
            }
            .meuselect option.par {
                width:135px;  /* Largura da janela do menu para NN */
                background-color:#F0FFF0; /* Cor do fundo dos
                links pares */
                color:#009ACD; /* Cor das letras dos links pares */
            }


            #perfil {
                position:absolute;
                top:-1px;
                left:0px;
                color:#69F;
                text-decoration: none;
                font: Arial, Helvetica, sans-serif;
            }

            .sombraPerfil  {
                position:absolute;
                margin-top:15px;
                margin-left:1000px;
                color: green;
                font: 16px Arial, Helvetica, sans-serif
            }


            #cadastrar {
                position:absolute;
                top:-1px;
                left:0px;
                color:#69F;
                text-decoration: none;
                font: Arial, Helvetica, sans-serif;
            }

            .sombra  {
                position:absolute;
                margin-top:15px;
                margin-left:1050px;
                color:#006;
                font: 16px Arial, Helvetica, sans-serif
            }

            /* links-sombra = administrdor */

            .sombraFab  {
                position:absolute;
                margin-top: 0px;
                margin-left: 40px;
                color:#006;
                font: 16px Arial, Helvetica, sans-serif
            }

            #cadastrarFab {
                position:absolute;
                top:-1px;
                left:0px;
                color:#69F;
                text-decoration: none;
                font: Arial, Helvetica, sans-serif;
            }

            #cadastrarLoja {
                position:absolute;
                top:-1px;
                left:0px;
                color:#69F;
                text-decoration: none;
                font: Arial, Helvetica, sans-serif;
            }

            .sombraLoja  {
                position:absolute;
                margin-top: 0px;
                margin-left: 170px;
                color:#006;
                font: 16px Arial, Helvetica, sans-serif
            }

            #cadastrarUsuario {
                position:absolute;
                top:-1px;
                left:0px;
                color:#69F;
                text-decoration: none;
                font: Arial, Helvetica, sans-serif;
            }

            .sombraUsuario  {
                position:absolute;
                margin-top: 0px;
                margin-left: 250px;
                font: 16px Arial, Helvetica, sans-serif
            }

            #cadastrarProduto {
                position:absolute;
                top:-1px;
                left:0px;
                color:#69F;
                text-decoration: none;
                font: Arial, Helvetica, sans-serif;
            }

            .sombraProduto  {
                position:absolute;
                margin-top: 0px;
                margin-left: 350px;
                color:#006;
                font: 16px Arial, Helvetica, sans-serif
            }

            #cadastrarFornecedor {
                position:absolute;
                top:-1px;
                left:0px;
                color:#69F;
                text-decoration: none;
                font: Arial, Helvetica, sans-serif;
            }

            .sombraFornecedor  {
                position:absolute;
                margin-top: 0px;
                margin-left: 460px;
                color:#006;
                font: 16px Arial, Helvetica, sans-serif
            }

            /* links-sombra = administrdor */


            /* container principal*/

            .container {
                border: 0px solid black;
                width: 1206px;
                height: 675px;
                margin: 0px auto;
            }

            #top {
                height: 230px;
                border: 0px solid blue;
            }

            #menu {
                width: 180px;
                margin-top: 5px;
                border: 0px solid red;
                float: left;
                height: 360px;
            }

            #main {
                width: 1010px;
                margin-top: 5px;
                border: 0px solid green;
                float: right;
                height: auto;
            }

            #footer {
                width: 1205px;
                float: right;

                margin-top: 5px;
                height: 70px;
                clear: both;

                color: #bbb;
                text-align: center;
                border-top: 1px dotted #bbb;

            }

            /* container principal */


            .login{

                color:#69F;
                font: 15px Verdana, Geneva, sans-serif;

            }


            .buscar {
                background: url(../Imagens/buscar2.png) no-repeat;
                width: 110px;
                height:55px;
                border-style:none
            }

            .buscar:hover {
                background: url(../Imagens/buscar-hover.png) no-repeat;
                width: 115px;
                height: 55px;
            }


            .buscar2 {
                background: url(../Imagens/botaobuscar.png) no-repeat;
                width: 105px;
                height: 48px;
                border-style:none;
            }

            .parcelas {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 15px;


            }
            .cadastro {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 10px;
                color: #000000;
            }
            a:hover {
                text-decoration: underline;
            }
            .tabelas {
                border: 1px solid #D6EFB5;
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 12px;
                color: #000000;
            }
            .textoverdana {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 11px;
                color: #000000;
            }
            .divisao {
                border-top-width: 1px;
                border-right-width: 1px;
                border-bottom-width: 1px;
                border-left-width: 1px;
                border-top-style: none;
                border-right-style: none;
                border-bottom-style: solid;
                border-left-style: none;
                border-top-color: #D6EFB5;
                border-right-color: #D6EFB5;
                border-bottom-color: #D6EFB5;
                border-left-color: #D6EFB5;
            }

            .precode {
                font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
                color:#C00;
                text-decoration: line-through;
                font-weight: bold;
            }

            .precopor {
                font-size:large;
                color: #090;
                font-weight: bolder;

            }

            .textorelat {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 10px;
                color: #000000;
            }

            .link{
                color:#666;
                font-family:Verdana, Geneva, sans-serif;
                text-decoration:none;
                cursor: pointer;
            }

            .fechar {
                cursor:pointer;
                background:#669900;
                font-weight:bold;
                color:#FFFFFF;
            }            
        </style>
    </head>
    <body>
        <div class="container" align="center">
            <div id="top">
                <form action="?flag=busca2" method="POST" name="dados">
                    <a href="sessaoCliente.php"><img src="../Imagens/dvdcabeca2.png" width="1205"/></a>
                    <table><tr><td height="2"/></tr></table>
                    <? if (isset($_SESSION['admin']) && $_SESSION['admin'] == t) { ?>
                        <table align="" width="1205px" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1EEB4">
                            <tr>
                                <td height="25px">
                                    <div class="sombraFab"><strong>Fabricante</strong>
                                        <div><strong><a id="cadastrarFab" href="sessaoCliente.php?flag=jfab">Fabricante</a></strong>
                                        </div></div>

                                    <div class="sombraLoja"><strong>Loja</strong>
                                        <div><strong><a id="cadastrarLoja" href="sessaoCliente.php?flag=jloj">Loja</a></strong>
                                        </div></div>

                                    <div class="sombraUsuario"><strong>Usuário</strong>
                                        <div><strong><a id="cadastrarUsuario" href="sessaoCliente.php?flag=juse">Usuário</a></strong>
                                        </div></div>

                                    <div class="sombraProduto"><strong>Produto</strong>
                                        <div><strong><a id="cadastrarProduto" href="sessaoCliente.php?flag=jpro">Produto</a></strong>
                                        </div></div>

                                    <div class="sombraFornecedor"><strong>Fornecedor</strong>
                                        <div><strong><a id="cadastrarFornecedor" href="sessaoCliente.php?flag=jfor">Fornecedor</a></strong>
                                        </div></div>
                                </td>
                            </tr>
                        </table>
                    <? } ?>
                    <table align="" width="1205px" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1EEB4">
                        <tr>
                            <td width="" height="" bgcolor="#FFFFFF">
                                <form action="" method="POST" name="dados">
                                    <table align="" width="1205px" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1EEB4">
                                        <tr>
                                            <td width="100px" height="40" bgcolor="#FFFFFF">
                                                <input type="submit" value="" size="" name="BuscaA" class="buscar2"/>
                                            </td>
                                            <td width="1000" align="">
                                                <input name="busca" type="text" id="busca" size="90" align=""/>
                                            </td>

                                            <? if (isset($_SESSION['codigo'])) { ?>
                                                <td align="right" width="105">
                                                    <a href="logout.php" class="login">logout</a>
                                                    &nbsp &nbsp
                                                </td>
                                                <div class="sombraPerfil"><strong>Perfil</strong>
                                                    <div><strong><a id="perfil" href="sessaoCliente.php?flag=jperf">Perfil</a></strong>
                                                    </div>
                                                </div>
                                                <div class="sombra"><strong>Amigos</strong>
                                                    <div><strong><a id="cadastrar" href="sessaoCliente.php?flag=jam">Amigos</a></strong>
                                                    </div>
                                                </div>
                                            <? } else if (!isset($_SESSION['codigo'])) { ?>
                                                <td align="right" width="105">
                                                    <a href="sessaoCliente.php?flag=jlogin" class="login">login</a>
                                                    &nbsp &nbsp
                                                </td>
                                                <div class="sombra"><strong>Cadastrar</strong>
                                                    <div><strong><a id="cadastrar" href="sessaoCliente.php?flag=jcad">Cadastrar</a></strong>
                                                    </div>
                                                </div>
                                            <? } ?>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </table>
                </form>

                <div id="menu" align="left">
                    <form action="?flag=busca" method="POST" name="dados">
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
                                    <input  name="Busca" type="submit" class="buscar" value="" size=""/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div id="main">
                    <?
                    if (isset($_GET["pg"])) {
                        include_once "inicio.php";
                    } else if (isset($_GET["id"])) {
                        $_SESSION["idProduto"] = $_GET["id"];
                        session_commit();
                        include_once "detalhes.php";
                    } if (isset($_SESSION["perfis"])) {
                        include_once 'perfisUsuario.php';
                    } else {
                        $page = (isset($_GET['flag'])) ? $_GET['flag'] : "home";
                        switch ($page) {
                            case "busca":
                                $page = "inicio.php";
                                break;
                            case "busca2":
                                $page = "inicio.php";
                                break;
                            case "jrec":
                                $page = "recomendar.php";
                                break;
                            case "jam":
                                if (isset($_GET["am"])) {
                                    $_SESSION["am"] = true;
                                    session_commit();
                                }
                                $page = "amigos.php";
                                break;
                            case "jlogin":
                                $page = "login.php";
                                break;
                            case "jcad":
                                $page = "cadastroUsuario.php";
                                break;
                            case "jcadPerf":
                                $page = "cadastroPerfil.php";
                                break;
                            case "jcadLoja":
                                $page = "cadastroLoja.php";
                                break;
                            case "jcadFab":
                                $page = "cadastroFabricante.php";
                                break;
                            case "jcadForn":
                                $page = "cadastroFornecedor.php";
                                break;
                            case "jcadProd":
                                $page = "cadastroProduto.php";
                                break;
                            case "jfab":
                                if (isset($_GET["erro"])) {
                                    $_SESSION["erro"] = true;
                                    session_commit();
                                }
                                $page = "fabricantes.php";
                                break;
                            case "jfor":
                                if (isset($_GET["erro"])) {
                                    $_SESSION["erro"] = true;
                                    session_commit();
                                }
                                $page = "fornecedores.php";
                                break;
                            case "juse":
                                $page = "usuarios.php";
                                break;
                            case "jpro":
                                if (isset($_GET["erro"])) {
                                    $_SESSION["erro"] = true;
                                    session_commit();
                                }
                                $page = "produtos.php";
                                break;
                            case "jloj":
                                if (isset($_GET["erro"])) {
                                    $_SESSION["erro"] = true;
                                    session_commit();
                                }
                                $page = "lojas.php";
                                break;
                            case "jperf":
                                if (isset($_GET["erro"])) {
                                    $_SESSION["erro"] = true;
                                    session_commit();
                                }
                                $page = "perfisUsuarioLogado.php";
                                break;
                            case "jdetal":
                                if (isset($_GET["id"])) {
                                    $_SESSION["idProduto"] = $_GET["id"];
                                    session_commit();
                                }
                                $page = "detalhes.php";
                                break;
                            default :
                                $page = "sessaoCliente.php";
                        }
                        include_once $page;
                    }
                    ?>
                </div>


                <div id="footer">algo</div>
            </div>
    </body>
</html>
