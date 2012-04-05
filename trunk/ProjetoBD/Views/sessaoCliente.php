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
                                <select size="1" name="faixaprecoDVD">
                                    <option selected value="Selecione">Faixa de preço</option>
                                    <option value="1">até R$ 5,00</option>
                                    <option value="2">R$ 5,01 à R$ 10,00</option>
                                    <option value="3">R$ 10,01 à R$ 25,00</option>
                                    <option value="4">R$ 25,01 à R$ 50,00</option>
                                    <option value="5">R$ 50,01 à R$ 70,00</option>
                                    <option value="6">mais de R$ 70,01</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ano:
                                <br/>
                                <select name="ano" id="ano">
                                    <?php
                                    for ($i = 2012; $i >= 1970; $i--) {
                                        echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["genero"] . "</option>\n";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                Loja:
                                <br/>
                                <select size="1" name="lojaDVD">
                                    <option selected value="Selecione">loja do produto</option>
                                    <option value="1">bemol</option>
                                    <option value="2">livraria saraiva</option>
                                    <option value="3">submarino</option>
                                    <option value="4">extra</option>
                                    <option value="5">siciliano</option>
                                    <option value="6">ponto frio</option>
                                    <option value="7">arena DVD</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Fabricante:
                                <br/>
                                <select size="1" name="fabricanteDVD">
                                    <option selected value="Selecione">fabricante do produto</option>
                                    <option value="1">video lar</option>
                                    <option value="2">disco lazer</option>
                                    <option value="3">endemol</option>
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
                if (isset($_POST["Submit"])) {
                    include_once "lojas.php";
                }else
                    include_once "inicio.html";
                ?>
            </div>

            <div id="footer">algo</div>
        </div>
    </body>
</html>