<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Fornecedor</title>
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
                <td><a href="../Views/cadastroFornecedor.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <tr>
                <td>Código</td>
                <td>Fornecedor</td>
            </tr>
            <?php
            include_once ("../Dao/FornecedorDAO.php");
            $model = new FornecedorDAO();
            if(isset($_POST["Submit"])) {
                $fornecedores = $model->filtrar($_POST["consulta"]);
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
