<?php
include_once ("../Models/fabricanteModel.php");

class fabricanteController {
    public function fabricanteController() {
        $acao = $_GET['acao'];
        switch ( $acao ) {
            case 'cadastrar' :
            {
                $model = new fabricanteModel();
                $model->setNome($_POST["fab_nome"]);
                $model->setNacionalidade($_POST["fab_nacionalidade"]);

                if($model->cadastrar()){
                    header("Location: ../Views/cadastrado.html");
                } else {
                    header("Location: ../Views/cadastroFabricante.php");
                }
                break;
            }
        }
    }
}
$controller = new fabricanteController();
?>
