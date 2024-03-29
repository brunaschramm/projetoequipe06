﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Produto</title>
    </head>

    <body>
        <form action="" method="post" name="dados">
            <table width="588" border="0" align="center" >
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Título:</font></td>
                    <td width="460">
                        <input name="titulo" type="text" class="formbutton" id="titulo" size="25" maxlength="40"></td>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Preço:</font></td>
                    <td width="460">
                        <input name="preco" type="text" class="formbutton" id="preco" size="7" maxlength="7"></td>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ano:</font></td>
                    <td><font size="2">
                            <input name="ano" type="text" id="ano" size="4" maxlength="4" class="formbutton"></font></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Produtora:</font></td>
                    <td><select name="produtora" id="produtora">
                            <?php
                            
                            try{

                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $produtores = $model->getProdutoras();
                            $tam = count($produtores);
                            echo "<option selected value=\"\"></option>";
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $produtores[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["produtora"] . "</option>\n";
                            }
                            
                            }catch(Exception $e){}

                            ?>
                        </select></td>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Gênero:</font></td>
                    <td><select name="genero" id="genero">
                            <?php

                            try{

                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $generos = $model->getGeneros();
                            $tam = count($generos);
                            echo "<option selected value=\"\"></option>";
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $generos[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["genero"] . "</option>\n";
                            }

                            }  catch (Exception $e){}

                            ?>
                        </select></td>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Censura:</font></td>
                    <td><select name="censura" id="censura">
                            <?php

                            try{

                                include_once ("../Dao/CaracteristicasDAO.php");
                                $model = new CaracteristicasDAO();
                                $censuras = $model->getCensuras();
                                $tam = count($censuras);
                                echo "<option selected value=\"\"></option>";
                                for ($i = 0; $i < $tam; $i++) {
                                    $aux = $censuras[$i];
                                    echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["censura"] . "</option>\n";
                                }
                            }  catch (Exception $e)   {}

                            ?>
                        </select></td>
                    
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Fornecedor:</font></td>
                    <td><select name="fornecedor" id="fornecedor">
                            <?php
                            try{
                            include_once ("../Dao/FornecedorDAO.php");
                            $model = new FornecedorDAO();
                            $fornecedores = $model->getAll();
                            $tam = count($fornecedores);
                            echo "<option selected value=\"\"></option>";
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $fornecedores[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["nome"] . "</option>\n";
                            }

                            }catch(Exception $e){}

                            ?>
                        </select></td>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Fabricante:</font></td>
                    <td><select name="fabricante" id="fabricante">
                            <?php

                            try{

                            include_once ("../Dao/FabricanteDAO.php");
                            $model = new FabricanteDAO();
                            $fabricantes = $model->getAll();
                            $tam = count($fabricantes);
                            echo "<option selected value=\"\"></option>";
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $fabricantes[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["nome"] . "</option>\n";
                            }

                            }  catch (Exception $e){}

                            ?>
                        </select></td>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Região:</font></td>
                    <td><select name="regiao" id="regiao">
                            <?php
                            try{

                                echo "<option selected value=\"\"></option>";
                                for ($i = 1; $i < 7; $i++) {
                                    echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
                                }
                            }  catch (Exception $e){}

                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Loja:</font></td>
                    <td><select name="loja" id="loja">
                            <?php

                            try{

                            include_once ("../Dao/LojaDAO.php");
                            $model = new LojaDAO();
                            $lojas = $model->getAll();
                            $tam = count($lojas);
                            echo "<option selected value=\"\"></option>";
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $lojas[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["nome"] . "</option>\n";
                            }

                            }catch(Exception $e){}

                            ?>
                        </select></td>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Formato Tela:</font></td>
                    <td><select name="formato" id="formato">
                            <?php

                            try{

                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $produtores = $model->getFormatos();
                            $tam = count($produtores);
                            echo "<option selected value=\"\"></option>";
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $produtores[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["formato"] . "</option>\n";
                            }

                            }  catch (Exception $e){}
                            ?>
                        </select></td>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Grupo:</font></td>
                    <td><select name="grupo" id="grupo">
                            <?php
                            try{

                                include_once ("../Dao/CaracteristicasDAO.php");
                                $model = new CaracteristicasDAO();
                                $grupos = $model->getGrupos();
                                $tam = count($grupos);
                                echo "<option selected value=\"\"></option>";
                                for ($i = 0; $i < $tam; $i++) {
                                    $aux = $grupos[$i];
                                    echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["grupo"] . "</option>\n";
                                }
                            }  catch (Exception $e){}

                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td height="22"> </td>

                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Consultar"/>
                    </td>
                </tr>
                </br>
            </table>
        </form>
        <table align="center" class="tabelas">
            <tr>
                <td><h3>Titulo</h3></td>
                <td><h3>Ano</h3></td>
                <td><h3>Preco</h3></td>
                <td><h3>Formato da Tela</h3></td>
                <td><h3>Genero</h3></td>
                <td><h3>Censura</h3></td>
                <td><h3>Regiao</h3></td>
                <td><h3>Grupo</h3></td>
                <td><h3>Fabricante</h3></td>
                <td><h3>Loja</h3></td>
                <td><h3>Fornecedor</h3></td>
                <td><h3>Produtora</h3></td>
                <td><a href="../Views/sessaoCliente.php?flag=jcadProd"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <?php

            try{

                include_once ("../Dao/ProdutoDAO.php");
                include_once ("../Controller/ProdutoController.php");
                $model = new ProdutoDAO();
                if(isset($_POST["Submit"])) {
                    $produtos = $model->consultar($_POST["titulo"], $_POST["preco"], $_POST["ano"],
                            $_POST["genero"], $_POST["fabricante"], $_POST["loja"], $_POST["fornecedor"], $_POST["produtora"],
                            $_POST["formato"], $_POST["censura"], $_POST["regiao"], $_POST["grupo"]);
                } else {
                    $produtos = $model->getAll();
                }
                $tam = count($produtos);
                for ($i = 0; $i < $tam; $i++) {
                    $aux = $produtos[$i];
                    echo "<tr><td>" . $aux["titulo"] . "</td><td>" . $aux["ano"] .
                    "</td><td>" . $aux["preco"] . "</td><td>" . $aux["formato"] .
                    "</td><td>" . $aux["genero"] . "</td><td>" . $aux["censura"] .
                    "</td><td>" . $aux["regiao"] . "</td><td>" . $aux["grupo"] .
                    "</td><td>" . $aux["fabricante"] . "</td><td>" . $aux["loja"] .
                    "</td><td>" . $aux["fornecedor"] . "</td><td>" . $aux["produtora"] .
                    "</td>"/*<td>" . $aux["descricao"] . "</td>.*/."<td><a href=\"../Controllers/ProdutoController.php?acao=excluir&id="
                    . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
                }

            }  catch (Exception $e){}

            ?>
        </table>
    </body>
</html>