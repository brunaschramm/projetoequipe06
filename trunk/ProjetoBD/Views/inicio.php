<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sem título</title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <table width="100%" class="">
            <tr><div>
                    <?
                    include_once ("../Dao/ProdutoDAO.php");
                    $model = new ProdutoDAO();
                    if (isset($_POST["Submit2"])) {
                        echo $_POST["busca"];
                        $produtos = $model->buscaSimples($_POST["busca"]);
                    }
                    if (isset($_POST["Submit"])) {
                        $produtos = $model()->buscaAvancada($POST_["titulo"], $POST_["genero"], $_POST["preco"], $POST_["ano"], $POST_["loja"], $POST_["produtora"]);
                        echo $_POST["genero"];
                    }
                    $tam = count($produtos);
                    
                    for ($i = 0; $i < $tam; $i++) {
                        $aux = $produtos[$i];
                        ?>
                        <td align="center">
                            <a href=""><img src="../Imagens/loja.png" width="70" height="35"></a>
                            <a href=""><img src="../Imagens/iraloja.png" width="90" height="35"></a>
                            </br></br>
                            <div class="css do produto" id="">
                                <a href="link do produto" class="css de link">
                                    <img src="../Imagens/Produtos/<?echo $aux["imagem"];?>" width="97" height="132"/>
                                </a>
                                </br>
                                <span class="link"><strong class=""><?echo $aux["titulo"];?></strong></span>
                                </a>
                                </br>

                                <span class="css dos precos">
                                    <span class="precode">de R$ 30,00</span></br>
                                    <span class="precopor">por: <strong>R$ 15,00</strong></span></br>
                                    <span class="parcelas">ou 3x de R$ 10,00</span></br>
                                </span>
                            </div>
                        </td>
                    <? 
                    } ?>

                </div></tr>
        </table>
    </body>