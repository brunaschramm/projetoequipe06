<?php
session_start();
$perfis = $_SESSION['perfis'];
unset($_SESSION["perfis"]);

if(!$perfis) {
    
}
if (!$perfis) {
    echo "<font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Nenhum perfil cadastrado!</font>";
} else {
    $tam = count($perfis);
    ?>
    <table align="center" class="tabelas">
        <tr>
            <td><h3>Gênero</h3></td>
            <td><h3>Produtora</h3></td>
            <td><h3>Loja</h3></td>
            <td><h3>Ano</h3></td>
            <td><h3>Grupo</h3></td>
            <td><h3>Censura</h3></td>
            <td><h3>Região</h3></td>
            <td><h3>Formato Tela</h3></td>
            <td><h3>Preço</h3></td>
            <td><a href="../Views/cadastroPerfil.php"><img src="../Imagens/adicionar.png" width="20" height="20"></a></td>
        </tr>
        <?php
        include_once ("../Dao/PerfilDAO.php");
        $tam = count($perfis);
        for ($i = 0; $i < $tam; $i++) {
            $aux = $perfis[$i];
            echo "<tr><td>" . $aux["genero"] . "</td><td>" . $aux["produtora"] . "</td><td>" . $aux["loja"] . "</td>\n";
            echo "<td>" . $aux["ano"] . "</td><td>" . $aux["grupo"] . "</td><td>" . $aux["censura"] . "</td>\n";
            echo "<td>" . $aux["regiao"] . "</td><td>" . $aux["formato"] . "</td>\n";
            switch ( $aux["preco"]) {
                case '1':
                    echo "<td>até R$ 10,00</td>";
                    break;
                case '2':
                    echo "<td>R$ 10,01 à R$ 20,00</td>";
                    break;
                case '3':
                    echo "<td>R$ 20,01 à R$ 30,00</td>";
                    break;
                case '4':
                    echo "<td>R$ 30,01 à R$ 40,00</td>";
                    break;
                case '5':
                    echo "<td>R$ 40,01 à R$ 50,00</td>";
                    break;
                case '6':
                    echo "<td>R$ 50,01 à R$ 60,00</td>";
                    break;
                case '7':
                    echo "<td>R$ 60,01 à R$ 70,00</td>";
                    break;
                case '8':
                    echo "<td>R$ 70,01 à R$ 80,00</td>";
                    break;
                case '9':
                    echo "<td>R$ 80,01 à R$ 90,00</td>";
                    break;
                case '10':
                    echo "<td>mais de R$ 90,01</td>";
                    break;
            }
            echo "</tr>";
        }
        ?>
    </table>
<? } ?>
