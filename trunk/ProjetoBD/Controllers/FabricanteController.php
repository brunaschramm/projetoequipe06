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

                $resulto = $model->salvar();

                if ($resulto == 1) {
                    header("Location: ../Views/cadastrado.html");
                } else {
                    header("Location: ../Views/cadastroFabricante.php");
                }
                break;
        }
    }

}

$controle = new FabricanteController();
?>