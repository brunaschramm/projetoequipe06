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

            function vercpf (cpf) 
            {
                if (cpf.length != 11 || cpf == "00000000000" 
                    || cpf == "11111111111" || cpf == "22222222222"
                    || cpf == "33333333333" || cpf == "44444444444"
                    || cpf == "55555555555" || cpf == "66666666666"
                    || cpf == "77777777777" || cpf == "88888888888"
                    || cpf == "99999999999")
                    return false;
                add = 0;
                for (i=0; i < 9; i ++)
                    add += parseInt(cpf.charAt(i)) * (10 - i);
                rev = 11 - (add % 11);
                if (rev == 10 || rev == 11)
                    rev = 0;
                if (rev != parseInt(cpf.charAt(9)))
                    return false;
                add = 0;
                for (i = 0; i < 10; i ++)
                    add += parseInt(cpf.charAt(i)) * (11 - i);
                rev = 11 - (add % 11);
                if (rev == 10 || rev == 11)
                    rev = 0;
                if (rev != parseInt(cpf.charAt(10)))
                    return false;
                return true;
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
                            include_once ("../Models/fabricante.php");
                            //$model = new FabricanteDAO();
                            //$fabricantes = $model->getAll();
                            $fab1 = new fabricante();
                            $fab1->setNome("fabricante1");
                            $fab1->setCodigo(1);
                            $fab2 = new fabricante();
                            $fab2->setNome("fabricante2");
                            $fab2->setCodigo(2);
                            $fab3 = new fabricante();
                            $fab3->setNome("fabricante3");
                            $fab3->setCodigo(3);
                            $fabricantes = array($fab1, $fab2, $fab3);
                            $tam = count($fabricantes);
                            for ($i = 0; $i < $tam; $i++) {
                                echo "<option value=\"".$fabricantes[$i]->getCodigo()."\">".$fabricantes[$i]->getNome()."</option>\n";
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Loja:</font></td>
                    <td><select name="fabricante" id="">
                            <?php
                            include_once ("../Models/loja.php");
                            //$model = new lojaDAO();
                            //$loja = $model->getAll();
                            $loj1 = new loja();
                            $loj1->setNome("loja1");
                            $loj1->setCodigo(1);
                            $loj2 = new loja();
                            $loj2->setNome("loja2");
                            $loj2->setCodigo(2);
                            $loj3 = new loja();
                            $loj3->setNome("loja3");
                            $loj3->setCodigo(3);
                            $lojas = array($loj1, $loj2, $loj3);
                            $tam = count($lojas);
                            for ($i = 0; $i < $tam; $i++) {
                                echo "<option value=\"".$lojas[$i]->getCodigo()."\">".$lojas[$i]->getNome()."</option>\n";
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
        </form>
    </body>
</html>
