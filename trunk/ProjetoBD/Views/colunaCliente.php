<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sem título</title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form action="inicio.php?b=t" target="main" method="POST" name="dados">
            <table bgcolor="#BFEFFF" align="right" class="tabelas">
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
                        </br>
                        <input name="titulo" type="text" id="titulo" size="">
                    </td>
                </tr>
                <tr>
                    <td>
                        Gênero:
                        </br>
                        <select size="1" name="genero">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $generos = $model->getGeneros();
                            $tam = count($generos);
                            echo "<option selected value=\"\">Selecione</option>";
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
                        </br>
                        <select size="1" name="preco">
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
                        </br>
                        <select size="1" name="ano">
                            <?php
                            echo "<option selected value=\"\">Selecione</option>";
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
                        </br>
                        <select size="1" name="loja">
                            <?php
                            include_once ("../Dao/LojaDAO.php");
                            $model = new LojaDAO();
                            $lojas = $model->getAll();
                            $tam = count($lojas);
                            echo "<option selected value=\"\">Selecione</option>";
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
                        </br>
                        <select size="1" name="produtora">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $produtoras = $model->getProdutoras();
                            $tam = count($produtoras);
                            echo "<option selected value=\"\">Selecione</option>";
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $produtoras[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["produtora"] . "</option>\n";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td align="center">
                        <input type="submit" value="" size="" name="Submit" class="buscar"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
