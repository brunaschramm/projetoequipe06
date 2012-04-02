<?php
include_once ("../Dao/FabricanteDAO.php");

class FabricanteController {
    function __construct() {
        $model = new FabricanteDAO();

        $acao = $_GET['acao'];

        switch ($acao) {
            case 'cadastrar':
                $model->setNome($_POST['fab_nome']);
                $model->setNacionalidade($_POST['fab_nacionalidade']);

                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/fabricantes.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroFabricante.php?flag=t");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                if ($resultado == 1) {
                    header("Location: ../Views/fabricantes.php?flag=f");
                } else {
                    header("Location: ../Views/fabricantes.php?flag=t");
                }
                break;
        }
    }
}
$controle = new FabricanteController();
?>