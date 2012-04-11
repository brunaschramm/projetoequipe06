<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Loja</title>

        <script language="JavaScript" >
            function enviardados(){
                if((document.dados.email.value=="" || document.dados.cpf.value=="") 
                    || (document.dados.email.value.indexOf('@')==-1 || document.dados.email.value.indexOf('.')==-1))
                {
                    alert("Preencha os campos LOGIN e SENHA corretamente!");
                    document.dados.login.focus();
                    return false;
                }
            }
        </script>        
    </head>
<?if (!isset($_SESSION)) {
    session_start();
}?>
    <body>
        <form action="../Controllers/ValidaLogin.php" method="POST" name="dados" onSubmit="return enviardados();" >
            <br/><br/><br/><br/>
            <table width="320" border="0" >
                <tr>
                    <td width="70" align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font></td>
                    <td width="250" align="right">
                        <input name="email" type="text" class="formbutton" id="email" size="" maxlength="150"></td>
                </tr>

                <tr>
                    <td align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CPF:</font></td>
                    <td align="right"><font size="2">
                            <input name="cpf" type="text" id="cpf" size="" maxlength="150" class="formbutton"></font></td>
                </tr>
                <tr>
                </tr>

                <tr>
                    <td height="22"> </td>

                    <td align="center">
                        <input name="Submit" type="submit" class="formobjects" value="Entrar"/>
                    </td>
                </tr>
            </table>
            <?
            if(isset($_SESSION["login"])){
                echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Verifique se o EMAIL e o CPF informados estão corretos!</font>";
            }
            ?>
        </form>
    </body>
</html>

