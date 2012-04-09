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
        <table align="center">
            <form action="" method="POST" name="dados">
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
                    <td width="460">
                        <input name="nome" type="text" class="formbutton" id="nome" size="50" maxlength="50"/>
                </tr>
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CPF:</font></td>
                    <td width="460">
                        <input name="cpf" type="text" class="formbutton" id="cpf" size="50" maxlength="50"/>
                </tr>
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Apelido:</font></td>
                    <td width="460">
                        <input name="apelido" type="text" class="formbutton" id="apelido" size="50" maxlength="50"/>
                </tr>
                <tr>
                    <td width="118"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Email:</font></td>
                    <td width="460">
                        <input name="email" type="text" class="formbutton" id="email" size="50" maxlength="50"/>
                    </td>
                    <td>
                        <input name="Submit" type="submit" class="formobjects" value="Consultar"/>
                    </td>
                </tr>
            </form>
        </table>
        <table align="center" class="tabelas">
            <tr>
                <td><h3>Nome</h3></td>
                <td><h3>Apelido</h3></td>
                <td><h3>Email</h3></td>
                <td><h3>CPF</h3></td>
                <td><a href="../Views/cadastroUsuario.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <?php
            include_once ("../Dao/UsuarioDAO.php");
            include_once ("../Controller/UsuarioController.php");
            $model = new UsuarioDAO();
            if(isset($_POST["Submit"])){
                $usuarios = $model->consultar($_POST["nome"], $_POST["cpf"], $_POST["apelido"], $_POST["email"]);
            } else {
                $usuarios = $model->getAll();
            }
            $tam = count($usuarios);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $usuarios[$i];
                echo "<tr><td>" . $aux["nome"] . "</td><td>" . $aux["apelido"] . "</td><td>" . $aux["email"] . "</td><td>" . $aux["cpf"] . "</td><td><a href=\"../Controllers/UsuarioController.php?acao=excluir&id=" . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>