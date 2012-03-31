<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Produto</title>
    </head>

    <body>
        <table>
            <tr>
                <td><a href="../Views/cadastroProduto.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <tr>
                <td>Titulo</td>
                <td>Ano</td>
                <td>Preco</td>
                <td>Formato da Tela</td>
                <td>Genero</td>
                <td>Censura</td>
                <td>Regiao</td>
                <td>Grupo</td>
                <td>Fabricante</td>
                <td>Loja</td>
                <td>Fornecedor</td>
                <td>Produtora</td>
                <td>Descricao</td>
            </tr>
            <?php
            include_once ("../Dao/ProdutoDAO.php");
            include_once ("../Controller/ProdutoController.php");
            $model = new ProdutoDAO();
            $produtos = $model->getAll();
            $tam = count($produtos);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $produtos[$i];
                echo "<tr><td>" . $aux["titulo"] . "</td><td>" . $aux["ano"] . 
                        "</td><td>" . $aux["preco"] . "</td><td>" . $aux["formato"] .
                        "</td><td>" . $aux["genero"] . "</td><td>" . $aux["censura"] .
                        "</td><td>" . $aux["regiao"] . "</td><td>" . $aux["grupo"] . 
                        "</td><td>" . $aux["fabricante"] . "</td><td>" . $aux["loja"] .
                        "</td><td>" . $aux["fornecedor"] . "</td><td>" . $aux["produtora"] . 
                        "</td><td>" . $aux["descricao"] . "</td><td><a href=\"../Controllers/ProdutoController.php?acao=excluir&id=" 
                        . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>