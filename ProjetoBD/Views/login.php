<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Loja</title>

        <script language="JavaScript" >
            function enviardados(){
                if((document.dados.email.value=="" || document.dados.cpf.value=="") 
                    || (document.dados.email.value.indexOf('@')==-1 || document.dados.email.value.indexOf('.')==-1) 
                    || (!vercpf(document.dados.us_cpf.value)))
                {
                    alert("Preencha os campos LOGIN e SENHA corretamente!");
                    document.dados.login.focus();
                    return false;
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
            }
        </script>
    </head>

    <body>
        <form action="../Controllers/ValidaLogin.php" method="POST" name="dados" onSubmit="return enviardados();" >

            <table width="588" border="0" >
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font></td>
                    <td width="460">
                        <input name="email" type="text" class="formbutton" id="email" size="52" maxlength="150"></td>
                </tr>

                <tr>
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CPF:</font></td>
                    <td><font size="2">
                            <input name="cpf" type="password" id="cpf" size="52" maxlength="150" class="formbutton"></font></td>
                </tr>
                <tr>
                </tr>

                <tr>
                    <td height="22"> </td>

                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Entrar">
                    </td>

                </tr>
            </table>
        </form>
    </body>
</html>