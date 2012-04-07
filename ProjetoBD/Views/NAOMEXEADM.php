<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Principal</title>
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
        <style>
            .container {
                border: 0px solid black;
                width: 1206px;
                height: 800px;
                margin: 0px auto;
            }

            #top {
                height: 200px;
                border: 0px solid blue;
            }

            #menu {
                width: 190px;
                margin-top: 5px;
                border: 1px solid red;
                float: left;
                height: 360px;
            }

            #main {
                width: 1010px;
                margin-top: 5px;
                border: 1px solid green;
                float: right;
                height: 360px;
            }

            #footer {
                clear: both;
                padding: 5px 10px;
                color: #bbb;
                text-align: center;
                border-top: 1px dotted #bbb;

            }
        </style>
    </head>
    <!--
        <frameset rows="136,500" cols="*" frameborder="0" >
            <frame name="head" id="head" SRC="cabecalho.html" NORESIZE SCROLLING="NO"   >
            <frameset rows="*" cols="17%,83%">
        <frame name="esq" id="esq" SRC="colunaCliente.php" NORESIZE SCROLLING="NO" >
        <frame name="main" id="main" SRC="inicio.php" NORESIZE SCROLLING="YES">
        </frameset>
                    </frameset>
    -->

    <body>
        <div class="container" align="center">
            <div id="top">
                <form action="" method="POST" name="dados">
                    <a href="NAOMEXEADM.php"><img src="../Imagens/dvdcabeca2.png" width="1205"/></a>
                    <table><tr><td height="2"/></tr></table>
                    <table align="" width="1205px" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1EEB4">
                        <tr>

                            <td width="77%">
                                <div class="sombraFab"><strong>Fabricante</strong>
                                    <div><strong><a class="cadastrarFab" href="NAOMEXEADM.php?flag=f">Fabricante</a></strong>
                                    </div></div>
                                <div class="sombraLoja"><strong>Loja</strong>
                                    <div><strong><a class="cadastrarLoja" href="NAOMEXEADM.php?flag=l">Loja</a></strong>
                                    </div></div>
                                <div class="sombraUsuario"><strong>Usuário</strong>
                                    <div><strong><a class="cadastrarUsuario" href="NAOMEXEADM.php?flag=u">Usuário</a></strong>
                                    </div></div>
                                <div class="sombraProduto"><strong>Produto</strong>
                                    <div><strong><a class="cadastrarProduto" href="NAOMEXEADM.php?flag=p">Produto</a></strong>
                                    </div></div>
                                <div class="sombraFornecedor"><strong>Fornecedor</strong>
                                    <div><strong><a class="cadastrarFornecedor" href="NAOMEXEADM.php?flag=fo">Fornecedor</a></strong>
                                    </div></div>
                            </td>
                            <td width="5%"><a href="logout.php" class="login" target="_top">logout</a></td>

                        </tr>
                    </table>
                </form>

            </div>


            <div id="main">
                <?
                
                $page = (isset($_GET['flag'])) ? $_GET['flag'] : "home" ;


                switch ($page) {
                    case "f":
                        $page = "cadastroFabricante.php";
                        break;
                    case "fo":
                        $page = "cadastroFornecedor.php";
                        break;
                    case "u":
                        $page = "cadastroUsuario.php";
                        break;
                    case "p":
                        $page = "cadastroProduto.php";
                        break;
                    case "l":
                        $page = "cadastroLoja.php";
                        break;
                    default :
                        $page = "NAOMEXEADM.php";
                }

                include_once $page;
                ?>
            </div>

            <div id="footer">algo</div>
        </div>
    </body>
</html>