<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Fornecedor</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.for_nome.value=="")
                {
                    alert("Preencha o campo NOME!");
                    document.dados.for_nome.focus();	
                    return false;
                }
            }
        </script>
    </head>

    <body>
        <form action="../Controllers/FornecedorController.php?acao=cadastrar" method="POST" name="dados" onSubmit="return enviardados();" >
            <table width="588" border="0" >
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
                    <td width="460">
                        <input name="for_nome" type="text" class="formbutton" id="for_nome" size="52" maxlength="150"/></td>
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
        <?
        if ($_GET['flag'] == "t") {
            echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Erro no cadastro, tente novamente!</font>";
        }
        ?>

    </body>
</html>

