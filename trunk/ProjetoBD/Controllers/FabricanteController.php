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
                    header("Location: ../Views/cadastrado.html");
                } else {
                    header("Location: ../Views/cadastroFabricante.php");
                }
                break;
        }
    }

    function getAllFabricantes(){
        $model = new FabricanteDAO();
        
        $fabricantes = $model->getAll();
        
        return $fabricantes;
    }
    
}

$controle = new FabricanteController();
?>