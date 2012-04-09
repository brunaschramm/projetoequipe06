<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Perfil</title>
    </head>

    <body>
        <form action="../Controllers/PerfilController.php?acao=cadastrar" method="post" name="dados" onSubmit="return enviardados();" >
            <table width="588" border="0" align="center">
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Faixa de Preço:</font></td>
                    <td>
                        <select size="1" name="preco">
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
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ano:</font></td>
                    <td><select name="ano" id="ano">
                            <?php
                            for ($i = 2012; $i >= 1960; $i--) {
                                echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Gênero:</font></td>
                    <td><select name="genero" id="genero">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $generos = $model->getGeneros();
                            $tam = count($generos);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $generos[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["genero"] . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Fabricante:</font></td>
                    <td><select name="fabricante" id="fabricante">
                            <?php
                            include_once ("../Dao/FabricanteDAO.php");
                            $model = new FabricanteDAO();
                            $fabricantes = $model->getAll();
                            $tam = count($fabricantes);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $fabricantes[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["nome"] . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Loja:</font></td>
                    <td><select name="loja" id="loja">
                            <?php
                            include_once ("../Dao/LojaDAO.php");
                            $model = new LojaDAO();
                            $lojas = $model->getAll();
                            $tam = count($lojas);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $lojas[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["nome"] . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Fornecedor:</font></td>
                    <td><select name="fornecedor" id="fornecedor">
                            <?php
                            include_once ("../Dao/FornecedorDAO.php");
                            $model = new FornecedorDAO();
                            $fornecedores = $model->getAll();
                            $tam = count($fornecedores);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $fornecedores[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["nome"] . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Produtora:</font></td>
                    <td><select name="produtora" id="produtora">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $produtores = $model->getProdutoras();
                            $tam = count($produtores);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $produtores[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["produtora"] . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Formato Tela:</font></td>
                    <td><select name="formato" id="formato">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $produtores = $model->getFormatos();
                            $tam = count($produtores);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $produtores[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["formato"] . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Censura:</font></td>
                    <td><select name="censura" id="censura">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $censuras = $model->getCensuras();
                            $tam = count($censuras);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $censuras[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["censura"] . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Região:</font></td>
                    <td><select name="regiao" id="regiao">
                            <?php
                            for ($i = 1; $i < 7; $i++) {
                                echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Grupo:</font></td>
                    <td><select name="grupo" id="grupo">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $grupos = $model->getGrupos();
                            $tam = count($grupos);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $grupos[$i];
                                echo "<option value=\"" . $aux["codigo"] . "\">" . $aux["grupo"] . "</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td height="22"> </td>

                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Cadastrar"/>
                    </td>

                </tr>
            </table>
            <?
            if ($_GET['flag'] == "t") {
                echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Você já possui esse perfil!</font>";
            }
            ?>
        </form>
    </body>
</html>