<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['codigo'])) {
        header("Location: ../Views/login.php");
    } else {
        include_once ("../Dao/AmigoDAO.php");
        $model = new AmigoDAO();
        $amigos = $model->getAmigos();
        $tam = count($amigos);
    }
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Amigos</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.am_email.value=="")
                {
                    alert("Informe o EMAIL do amigo!");
                    document.dados.am_email.focus();	
                    return false;
                }
            }            
        </script>
    </head>

    <body>
        <table width="588" border="0" align="center">
            <form action="../Controllers/AmigoController.php?acao=cadastrar" method="POST" name="dados" onSubmit="return enviardados();" >
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Email do amigo:</font></td>
                    <td width="460">
                        <input name="am_email" type="text" class="formbutton" id="am_email" size="52" maxlength="150"/></td>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nível de Amizade:</font></td>
                    <td><select  name="niv_amizade">
                            <option value="Conhecidos">Conhecidos</option>
                            <option value="Amigos">Amigos</option>
                            <option value="Super Amigos">Super Amigos</option>
                        </select></td>
                </tr>
                <tr>
                    <td height="22"> </td>
                    <td>
                        <input name="Adicionar" type="submit" class="formobjects" value="Adicionar"/>
                    </td>
                </tr>
            </form>
        </table>
        <?
        if (isset($_SESSION["am"])) {
            echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Amigo não cadastrado no sistema!</font>";
            unset($_SESSION["am"]);
        }
        ?>
        <table class = "tabelas">
            <tr>
                <td>
                    <td width="118" colspan="4"><h2>Amigos Cadastrados</h2></td>
                </td>
            </tr>
            <tr>
                <td><h3>Nome</h3></td>
                <td><h3>Email</h3></td>
                <td><h3>Apelido</h3></td>
                <td><h3>Nível de Amizade</h3></td>
            </tr>
            <?
            for ($i = 0; $i < $tam; $i++) {
                $aux = $amigos[$i];
                echo "<tr><td>" . $aux["nome_amigo"] . "</td><td>" . $aux["email_amigo"] . "</td><td>" . $aux["apelido"] . "</td><td>" . $aux["nivel_amizade"] . "</td></tr>\n";
            }
            ?>
        </table>
        <?
        if ($_GET['flag'] == "t") {
            echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Erro no cadastro, tente novamente!</font>";
        }
        ?>
    </body>
</html>