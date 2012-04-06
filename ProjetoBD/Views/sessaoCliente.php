<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Principal</title>
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
        <style>
            .container {
                border: 1px solid blue;
                width: 1206px;
                height: 800px;
                margin-top: 0px;
                margin: auto;
                margin-bottom: auto;

            }

            #top {
                height: 136px;
                border: 0px solid blue;
            }

            #menu {
                width: 190px;
                margin-top: 5px;
                border: 1px solid red;
                float: left;
                height: 360px;
            }

            #main {
                width: 1010px;
                margin-top: 5px;
                border: 1px solid green;
                float: right;
                height: auto;
            }

            #footer {
                clear: both;
                padding: 5px 10px;
                color: #bbb;
                text-align: center;
                border-top: 1px dotted #bbb;
                height: 30px;




            }
        </style>
    </head> 
    <!--
        <frameset rows="136,500" cols="*" frameborder="0" >
            <frame name="head" id="head" SRC="cabecalho.html" NORESIZE SCROLLING="NO"   >
            <frameset rows="*" cols="17%,83%">
        <frame name="esq" id="esq" SRC="colunaCliente.html" NORESIZE SCROLLING="NO" >
        <frame name="main" id="main" SRC="inicio.html" NORESIZE SCROLLING="YES">
        </frameset>
                    </frameset>
    -->

    <body>
        <div class="container">
            <div id="top">
                <img src="../Imagens/dvdcabeca2.png">
            </div>
            <div id="menu">
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
                                    for ($i = 2012; $i >= 1970; $i--) {
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
                                <input name="Submit" type="submit" class="buscar" value="" size=""/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="main">
                <?
                if (isset($_POST["Submit"]) || isset($_POST["Submit2"])) {
                    include_once "inicio.php";
                } else {
                    include_once "inicio.html";
                }
                ?>
            </div>
            <div id="footer">algo</div>
        </div>
    </body>
</html>