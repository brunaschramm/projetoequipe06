<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Usuário</title>

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
                <td><a href="../Views/cadastroUsuario.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>Apelido</td>
                <td>Email</td>
                <td>CPF</td>
            </tr>
            <?php
            include_once ("../Dao/UsuarioDAO.php");
            include_once ("../Controller/UsuarioController.php");
            $model = new UsuarioDAO();
            $usuarios = $model->getAll();
            $tam = count($usuarios);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $usuarios[$i];
                echo "<tr><td>" . $aux["nome"] . "</td><td>" . $aux["apelido"] . "</td><td>" . $aux["email"] . "</td><td>" . $aux["cpf"] . "</td><td><a href=\"../Controllers/UsuarioController.php?acao=excluir&id=" . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>