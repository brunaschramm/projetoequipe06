<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Fabricante</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.pesquisa.value=="")
                {
                    alert("Preencha o campo PESQUISA!");
                    document.dados.pesquisa.focus();	
                    return false;
                }
            }
        </script>
    </head>

    <body>
        <table>
            <tr>
                <td><a href="../Views/cadastroFabricante.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <tr>
                <td>Fabricantes</td>
                <td>Nacionalidade</td>
            </tr>
            <?php
            include_once ("../Dao/FabricanteDAO.php");
            include_once ("../Controller/FabricanteController.php");
            $model = new FabricanteDAO();
            if (!$_GET["filter"]) {
                $fabricantes = $model->getAll();
            } else {
                $fabricantes = $model->getPesquisa($_GET["filter"]);
            }
            $tam = count($fabricantes);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $fabricantes[$i];
                echo "<tr><td>" . $aux["fabricante"] . "</td><td>" . $aux["nacionalidade"] . "</td><td><a href=\"../Controllers/FabricanteController.php?acao=excluir&id=" . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>