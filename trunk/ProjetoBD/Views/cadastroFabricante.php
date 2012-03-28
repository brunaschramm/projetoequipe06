﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Fabricante</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.fab_nome.value=="")
                {
                    alert("Preencha o campo NOME corretamente!");
                    document.dados.fab_nome.focus();	
                    return false;
                }
	
                if (document.dados.fab_nacionalidade.value=="") 
                {
                    alert("Preencha o campo NACIONALIDADE corretamente!");
                    document.dados.fab_nacionalidade.focus();
                    return false;
                }
            }

        </script>
    </head>

    <body>
        <form action="../Controllers/FabricanteController.php?acao=cadastrar" method="POST" name="dados" onSubmit="return enviardados();" >

            <table width="588" border="0" >
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
                    <td width="460">
                        <input name="fab_nome" type="text" class="formbutton" id="fab_nome" size="52" maxlength="150"/></td>
                </tr>

                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nacionalidade:</font></td>
                    <td width="460">
                        <input name="fab_nacionalidade" type="text" class="formbutton" id="fab_nacionalidade" size="30" maxlength="20"/></td>
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
