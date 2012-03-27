<?php
include_once ("../Models/lojaModel.php");

class lojaController {
    public function lojaController() {
        $acao = $_GET['acao'];
        switch ( $acao ) {
            case 'cadastrar' :
            {
                $model = new lojaModel();
                $model->setNome($_POST["loj_nome"]);
                $model->setEmail($_POST["loj_email"]);
                $model->setEndereco($_POST["loj_endereco"]);

                if($model->cadastrar()){
                    header("Location: ../Views/cadastrado.html");
                } else {
                    
                    header("Location: ../Views/cadastroLoja.php");
                }
                break;
            }
        }
    }
}
$controller = new lojaController();
?>