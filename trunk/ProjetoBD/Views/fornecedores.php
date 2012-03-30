<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Fornecedor</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.for_nome.value=="")
                {
                    alert("Preencha o campo NOME corretamente!");
                    document.dados.fab_nome.focus();	
                    return false;
                }
            }
        </script>
    </head>

    <body>

        <table>
            <tr>
                <td><a href="../Views/cadastroFornecedor.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <tr>
                <td>Código</td>
                <td>Fornecedor</td>
            </tr>
            <?php
            include_once ("../Dao/FornecedorDAO.php");
            include_once ("../Controller/FornecedorController.php");
            $model = new FornecedorDAO();
            $fornecedores = $model->getAll();
            $tam = count($fornecedores);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $fornecedores[$i];
                echo "<tr><td>" . $aux["nome"] . "</td><td><a href=\"../Controllers/FornecedorController.php?acao=excluir&id=" . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>
