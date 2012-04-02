﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Fabricante</title>
    </head>

    <body>
        <table>
            <form action="" method="POST" name="dados">
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Consultar:</font></td>
                    <td width="460">
                        <input name="consulta" type="text" class="formbutton" id="consulta" size="50" maxlength="50"/>
                    </td>
                    <td height="22"> </td>
                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Pesquisar"/>
                    </td>
                </tr>
            </form>
            <tr>
                <td><a href="../Views/cadastroFabricante.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <tr>
                <td>Fabricantes</td>
                <td>Nacionalidade</td>
            </tr>
            <?php
            include_once ("../Dao/FabricanteDAO.php");
            $model = new FabricanteDAO();
            if (isset($_POST["Submit"])) {
                $fabricantes = $model->filtrar($_POST["consulta"]);
            } else {
                $fabricantes = $model->getAll();
            }
            $tam = count($fabricantes);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $fabricantes[$i];
                echo "<tr><td>" . $aux["nome"] . "</td><td>" . $aux["nacionalidade"] . "</td><td><a href=\"../Controllers/FabricanteController.php?acao=excluir&id=" . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>