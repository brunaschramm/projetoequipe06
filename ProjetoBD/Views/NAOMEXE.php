﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Principal</title>
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
        <style>
            .container {
                border: 0px solid black;
                width: 1206px;
                height: 800px;
                margin: 0px auto;
            }

            #top {
                height: 200px;
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
                height: 360px;
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
        <frame name="esq" id="esq" SRC="colunaCliente.php" NORESIZE SCROLLING="NO" >
        <frame name="main" id="main" SRC="inicio.php" NORESIZE SCROLLING="YES">
        </frameset>
                    </frameset>
    -->

    <body>
        <div class="container" align="center">
            <div id="top">
                <form action="" method="POST" name="dados">
                    <img src="../Imagens/dvdcabeca2.png" width="1205"/>
                    <table><tr><td height="2"/></tr></table>
                    <table align="" width="1205px" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1EEB4">
                        <tr>
                            <td width="100px" height="" bgcolor="#FFFFFF">
                                    <input type="submit" value="" size="" name="Submit2" class="buscar2"/>
                            </td>
                            <td width="1040px">
                                <input name="busca" type="text" id="busca" size="100%" align=""/>
                                 &nbsp &nbsp &nbsp
                                 &nbsp &nbsp &nbsp
                                 &nbsp &nbsp &nbsp
                                 &nbsp &nbsp &nbsp
                                 &nbsp &nbsp &nbsp
                                 &nbsp &nbsp &nbsp
                                 
                                <a href="login.php" target="main" class="login">login</a>
                                <div class="sombra"><strong>Cadastrar</strong>
                                    <div><strong><a class="cadastrar" href="">Cadastrar</a></strong>
                                    </div>
                                </div>
                            </td>
                            <td width="50px" align="center">
                                
                            </td>
                            
                        </tr>
                    </table>
                </form>

            </div>

            <div id="menu" align="left">
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
                            <input name="tituloDVD" type="text" id="titulo" size="14px">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gênero:
                            <br/>
                            <input name="generoDVD" type="text" id="genero" size="14px"/>
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
                            <select size="1" name="anoDVD">
                                <option selected value="Selecione">Ano do filme</option>
                                <option value="1">2012</option>
                                <option value="2">2011</option>
                                <option value="3">2010</option>
                                <option value="4">2009</option>
                                <option value="5">2008</option>
                                <option value="6">2007</option>
                                <option value="7">2006</option>
                                <option value="8">2005</option>
                                <option value="9">2004</option>
                                <option value="10">2003</option>
                                <option value="11">2002</option>
                                <option value="12">2001</option>
                                <option value="13">2000</option>
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
            </div>


            <div id="main">

            </div>

            <div id="footer">algo</div>
        </div>
    </body>
</html>