<!DOCTYPE html>
<body>
<?php
include_once ("../Models/lojaModel.class.php");

class lojaController {
    public function lojaController() {
        $acao = $_GET['acao'];

        switch($acao) {
            case 'cadastrar':
                $model = new lojaModel();
                $model->setNome($_POST["loj_nome"]);                
                $model->setEmail($_POST["loj_email"]);
                $model->setEndereco($_POST["loj_endereco"]);

                if($model->cadastrar()){
                    header("Location: ../Views/cadastrado.html");
                } else {
                    header("Location: http://www.google.com.br");
                    //header( "Location: http://../Views/erro.html" );
                }
                break;
        }
    }
}
$controle = new lojaController();
?>
</body>