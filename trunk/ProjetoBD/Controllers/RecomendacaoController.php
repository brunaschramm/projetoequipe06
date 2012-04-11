<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once("../Dao/RecomendacaoDAO.php");

class RecomendacaoController {

    function __construct() {
        $acao = $_GET['acao'];

        $model = new RecomendacaoDAO();

        switch ($acao) {
            case 'cadastrar':
                $model->setNome($_POST['loj_nome']);
                $model->setEndereco($_POST['loj_endereco']);

                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/lojas.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroLoja.php?flag=t");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                if ($resultado == 1) {
                    header("Location: ../Views/lojas.php?flag=f");
                } else {
                    header("Location: ../Views/lojas.php?flag=t");
                }
                break;
            case 'recomendar':                
                $usuario = $_SESSION["codigo"];
                
                foreach ($_POST["amigo"] as $campo => $valor) {
                    $$campo = $valor;
                    $resultado = $model->salvar($valor, $usuario, $_GET["id"]);
                }

                header("Location: ../Views/sessaoCliente.php?flag=jdetal&id=" . $_GET["id"]);
                
                break;
        }
    }
}
$controle = new RecomendacaoController();
?>