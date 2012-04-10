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
                    header("Location: ../Views/sessaoCliente.php?flag=jfab");
                } else {
                    header("Location: ../Views/sessaoCliente.php?flag=jfab&erro");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                header("Location: ../Views/sessaoCliente.php?flag=jfab");
                break;
        }
    }
}
$controle = new FabricanteController();
?>