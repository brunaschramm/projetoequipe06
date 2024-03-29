﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Produto</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.titulo.value=="")
                {
                    alert("Preencha o campo TITULO corretamente!");
                    document.dados.titulo.focus();	
                    return false;
                }
	
                if( document.dados.preco.value=="")
                {
                    alert( "Preencha o campo PRECO corretamente!" );
                    document.dados.preco.focus();
                    return false;
                }
                
                if( document.dados.ano.value=="")
                {
                    alert( "Preencha o campo ANO corretamente!" );
                    document.dados.ano.focus();
                    return false;
                }
            }
        </script>
    </head>

    <body>
        <form action="../Controllers/ProdutoController.php?acao=cadastrar" method="post" name="dados" onSubmit="return enviardados();" >
            <table width="588" border="0" align="center">
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Título:</font></td>
                    <td width="460">
                        <input name="titulo" type="text" class="formbutton" id="titulo" size="52" maxlength="150"></td>
                </tr>

                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Preço:</font></td>
                    <td width="460">
                        <input name="preco" type="text" class="formbutton" id="preco" size="30" maxlength="20"></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ano:</font></td>
                    <td><font size="2">
                            <input name="ano" type="text" id="ano" size="11" maxlength="11" class="formbutton"></font></td>
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
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Descrição:</font></td>
                    <td rowspan="2"><font size="2">
                            <textarea name="descricao" cols="50" rows="8" class="formbutton" id="descricao" input ></textarea></font></td>
                </tr>

                <tr>
                    <td height="85"><p><strong><font face="Verdana, Arial, Helvetica, sans-serif"><font size="1"><br>
                                    </font></font></strong></p></td>
                </tr>

                <tr>
                    <td height="22"> </td>

                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Cadastrar"/>
                        <input name="Reset" type="reset" class="formobjects" value="Limpar"/>
                    </td>

                </tr>
            </table>
            <?
            if ($_GET['flag'] == "t") {
                echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Erro no cadastro, tente novamente!</font>";
            }
            ?>
        </form>
    </body>
</html>