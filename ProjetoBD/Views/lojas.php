<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Loja</title>
    </head>

    <body>
        <table>
            <form action="" method="POST" name="dados">
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Loja:</font></td>
                    <td width="460">
                        <input name="nome" type="text" class="formbutton" id="nome" size="50" maxlength="50"/>
                </tr>
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Endereço:</font></td>
                    <td width="460">
                        <input name="endereco" type="text" class="formbutton" id="endereco" size="50" maxlength="50"/>
                    </td>
                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Consultar"/>
                    </td>
                </tr>
            </form>
            <tr>
                <td><a href="../Views/cadastroLoja.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <tr>
                <td>Loja</td>
                <td>Endereco</td>
            </tr>
            <?php
            include_once ("../Dao/LojaDAO.php");
            $model = new LojaDAO();
            if(isset($_POST["Submit"])) {
                $lojas = $model->consultar($_POST["nome"], $_POST["endereco"]);
            } else {
                $lojas = $model->getAll();
            }
            $tam = count($lojas);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $lojas[$i];
                echo "<tr><td>" . $aux["nome"] . "</td><td>" . $aux["endereco"] . "</td><td><a href=\"../Controllers/LojaController.php?acao=excluir&id=" . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>