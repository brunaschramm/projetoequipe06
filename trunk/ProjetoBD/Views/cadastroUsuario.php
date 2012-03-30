<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Usuário</title>

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
        <form action="../Controllers/UsuarioController.php?acao=cadastrar" method="post" name="dados" onSubmit="return enviardados();" >

            <table width="588" border="0" >
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
                    <td width="460">
                        <input name="us_nome" type="text" class="formbutton" id="us_nome" size="52" maxlength="150"></td>
                </tr>

                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Apelido:</font></td>
                    <td width="460">
                        <input name="us_apelido" type="text" class="formbutton" id="us_apelido" size="30" maxlength="20"></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CPF:</font></td>
                    <td><font size="2">
                            <input name="us_cpf" type="text" id="us_cpf" size="11" maxlength="11" class="formbutton"></font></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font></td>
                    <td><font size="2">
                            <input name="us_email" type="text" id="us_email" size="52" maxlength="150" class="formbutton"></font></td>
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