<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['codigo'])) {
    header("Location: ../Views/login.php");
} else {
    echo 'falta definir';
}
?>

﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
        <form action="../Controllers/AmigoController.php?acao=cadastrar" method="post" name="dados" onSubmit="return enviardados();" >

            <table width="588" border="0" align="center">
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Email do amigo:</font></td>
                    <td width="460">
                        <input name="am_email" type="text" class="formbutton" id="am_email" size="52" maxlength="150"/></td>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nível de Amizade:</font></td>
                    <td><select  name="niv_amizade">
                            <option selected value="Selecione"></option>
                            <option value="Amigos">Amigos</option>
                            <option value="Super Amigos">Super Amigos</option>
                        </select></td>
                </tr>

                <tr>
                    <td height="22"> </td>
                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Adicionar"/>
                    </td>
                </tr>
            </table>
        </form>
        <table>
            <?php
            include_once ("../Dao/UsuarioDAO.php");
            $model = new UsuarioDAO();
            $amigos = $model->getAmigos();
            $tam = count($amigos);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $amigos[$i];
                echo "<tr><td>" . $aux["nome_amigo"] . "</td><td>" . $aux["email_amigo"] . "</td></tr><td>" . $aux["apelido"] . "</td><td><a href=\"../Controllers/UsuarioController.php?acao=excluirAmigo&id="
                . $aux["cod_amigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
            <tr>
                <td>

                </td>
            </tr>
        </table>
        <?
        if ($_GET['flag'] == "t") {
            echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Erro no cadastro, tente novamente!</font>";
        }
        ?>
    </body>
</html>
