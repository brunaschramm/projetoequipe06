<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cadastro de Loja</title>

        <script language="JavaScript" >
            function enviardados(){	
                if(document.dados.loj_nome.value=="")
                {
                    alert("Preencha o campo NOME corretamente!");
                    document.dados.loj_nome.focus();	
                    return false;
                }
	
                if(document.dados.loj_email.value=="" && document.dados.loj_endereco.value=="") {
                    alert( "Preencha o campo E-MAIL ou ENDEREÇO!" );
                    document.dados.loj_email.focus();
                    return false;
                }
        
                if(document.dados.loj_email.value!="" && (document.dados.loj_email.value.indexOf('@')==-1 || document.dados.loj_email.value.indexOf('.')==-1 ))
                {
                    alert( "Preencha o campo E-MAIL corretamente!" );
                    document.dados.loj_email.focus();
                    return false;
                }
            }
        </script>
    </head>

    <body>
        <table>
            <tr>
                <td><a href="../Views/cadastroLoja.php?flag=f"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
            </tr>
            <tr>
                <td>Loja</td>
                <td>Endereco</td>
            </tr>
            <?php
            include_once ("../Dao/LojaDAO.php");
            include_once ("../Controller/LojaController.php");
            $model = new LojaDAO();
            $lojas = $model->getAll();
            $tam = count($lojas);
            for ($i = 0; $i < $tam; $i++) {
                $aux = $lojas[$i];
                echo "<tr><td>" . $aux["nome"] . "</td><td>" . $aux["endereco"] . "</td><td><a href=\"../Controllers/LojaController.php?acao=excluir&id=" . $aux["codigo"] . "\"><img src=\"../Imagens/excluir.png\" width=\"20\" height=\"20\"></a></td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>