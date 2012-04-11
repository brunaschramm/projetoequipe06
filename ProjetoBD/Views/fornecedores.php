<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Fornecedor</title>
    </head>
    <?
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>
    <body>
        <table align="center">
            <form action="" method="POST" name="dados">
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Fornecedor:</font></td>
                    <td width="460">
                        <input name="consulta" type="text" class="formbutton" id="consulta" size="50" maxlength="50"/>
                    </td>
                    <td height="22"> </td>
                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Consultar"/>
                    </td>
                </tr>
            </form>
        </table>
        <?
        if (isset($_SESSION["erro"])) {
            echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FF0000\">Erro no cadastro!</font>";
            unset($_SESSION["erro"]);
        }
        ?>
        <table align="center" class="tabelas">
            <tr>
                <td><h3>Fornecedor</h3></td>
                <td><a href="../Views/sessaoCliente.php?flag=jcadForn"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <?php
            include_once ("../Dao/FornecedorDAO.php");
            $model = new FornecedorDAO();
            if (isset($_POST["Submit"])) {
                $fornecedores = $model->consultar($_POST["consulta"]);
            } else {
                $fornecedores = $model->getAll();
            }
            $tam = count($fornecedores);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $fornecedores[$i];
                echo "<tr><td>" . $aux["nome"] . "</td><td><a href=\"../Controllers/FornecedorController.php?acao=excluir&id=" . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>
