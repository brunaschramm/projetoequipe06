<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Produto</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.us_nome.value=="")
                {
                    alert("Preencha o campo NOME corretamente!");
                    document.dados.us_nome.focus();	
                    return false;
                }
	
                if (!vercpf(document.dados.us_cpf.value)) 
                {
                    alert("Preencha o campo CPF corretamente!");
                    document.dados.us_cpf.focus();
                    return false;
                }
	
                if( document.dados.us_email.value=="" || document.dados.us_email.value.indexOf('@')==-1 || document.dados.us_email.value.indexOf('.')==-1 )
                {
                    alert( "Preencha o campo E-MAIL corretamente!" );
                    document.dados.us_email.focus();
                    return false;
                }
            }
        </script>
    </head>

    <body>
        <form action="../Controllers/ProdutoController?acao=cadastrar" method="post" name="dados" onSubmit="return enviardados();" >

            <table width="588" border="0" >
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Título:</font></td>
                    <td width="460">
                        <input name="pr_titulo" type="text" class="formbutton" id="pr_titulo" size="52" maxlength="150"></td>
                </tr>

                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Preço:</font></td>
                    <td width="460">
                        <input name="pr_preco" type="text" class="formbutton" id="pr_preco" size="30" maxlength="20"></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ano:</font></td>
                    <td><font size="2">
                            <input name="pr_ano" type="text" id="pr_ano" size="11" maxlength="11" class="formbutton"></font></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Gênero:</font></td>
                    <td><font size="2">
                            <input name="pr_genero" type="text" id="pr_genero" size="52" maxlength="150" class="formbutton"></font></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Fabricante:</font></td>
                    <td><select name="fabricante" id="">
                            <?php
                            include_once ("../Dao/FabricanteDAO.php");
                            $model = new FabricanteDAO();
                            $fabricantes = $model->getAll();
                            $tam = count($fabricantes);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $fabricantes[$i];
                                echo "<option value=\"".$aux["codigo"]."\">".$aux["fabricante"]."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Loja:</font></td>
                    <td><select name="loja" id="">
                            <?php
                            include_once ("../Dao/LojaDAO.php");
                            $model = new LojaDAO();
                            $lojas = $model->getAll();
                            $tam = count($lojas);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $lojas[$i];
                                echo "<option value=\"".$aux["codigo"]."\">".$aux["nome"]."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>
                
                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Fornecedor:</font></td>
                    <td><select name="fornecedor" id="">
                            <?php
                            include_once ("../Dao/FornecedorDAO.php");
                            $model = new FornecedorDAO();
                            $fornecedores = $model->getAll();
                            $tam = count($fornecedores);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $fornecedores[$i];
                                echo "<option value=\"".$aux["codigo"]."\">".$aux["nome"]."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>
                
                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Produtor:</font></td>
                    <td><select name="produtor" id="">
                            <?php
                            include_once ("../Dao/ProdutorDAO.php");
                            $model = new ProdutorDAO();
                            $produtores = $model->getAll();
                            $tam = count($produtores);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $produtores[$i];
                                echo "<option value=\"".$aux["codigo"]."\">".$aux["produtora"]."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>
                
                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Formato Tela:</font></td>
                    <td><select name="formato" id="">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $produtores = $model->getFormatos();
                            $tam = count($produtores);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $produtores[$i];
                                echo "<option value=\"".$aux["codigo"]."\">".$aux["formato"]."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>
                
                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Censura:</font></td>
                    <td><select name="formato" id="">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $censuras = $model->getCensura();
                            $tam = count($censuras);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $censuras[$i];
                                echo "<option value=\"".$aux["codigo"]."\">".$aux["censura"]."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>
                
                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Região:</font></td>
                    <td><select name="formato" id="">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $regioes = $model->getRegioes();
                            $tam = count($regioes);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $regioes[$i];
                                echo "<option value=\"".$aux["codigo"]."\">".$aux["regiao"]."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>
                
                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Grupo:</font></td>
                    <td><select name="formato" id="">
                            <?php
                            include_once ("../Dao/CaracteristicasDAO.php");
                            $model = new CaracteristicasDAO();
                            $grupos = $model->getGrupos();
                            $tam = count($grupos);
                            for ($i = 0; $i < $tam; $i++) {
                                $aux = $grupos[$i];
                                echo "<option value=\"".$aux["codigo"]."\">".$aux["grupo"]."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Descrição:</font></td>
                    <td rowspan="2"><font size="2">
                            <textarea name="pr_descricao" cols="50" rows="8" class="formbutton" id="pr_descricao" input ></textarea></font></td>
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
            <?if($_GET['flag'] == "t"){
                echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Erro no cadastro, tente novamente!</font>";
            }?>
        </form>
    </body>
</html>
