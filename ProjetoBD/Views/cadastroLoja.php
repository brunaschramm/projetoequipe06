<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Loja</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.loj_nome.value=="")
                {
                    alert("Preencha o campo NOME corretamente!");
                    document.dados.loj_nome.focus();	
                    return false;
                }
	
                if(document.dados.loj_endereco.value=="") {
                    alert( "Preencha o campo ENDEREÇO!" );
                    document.dados.loj_email.focus();
                    return false;
                }
            }
        </script>
    </head>

    <body>
        <form action="../Controllers/LojaController.php?acao=cadastrar" method="POST" name="dados" onSubmit="return enviardados();" >

            <table width="588" border="0" align="center">
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
                    <td width="460">
                        <input name="loj_nome" type="text" class="formbutton" id="loj_nome" size="52" maxlength="150"/></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Endereço:</font></td>
                    <td><font size="2">
                            <input name="loj_endereco" type="text" id="loj_endereco" size="52" maxlength="150" class="formbutton"/></font></td>
                </tr>

                <tr>
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