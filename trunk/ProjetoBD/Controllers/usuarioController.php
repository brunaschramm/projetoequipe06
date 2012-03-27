<?php
include_once ("../Models/usuarioModel.php");

class usuarioController {
    public function usuarioController() {
        $acao = $_GET['acao'];
        switch ( $acao ) {
            case 'cadastrar':
            {
                $model = new usuarioModel();
                $model->setNome($_POST["us_nome"]);
                $model->setCpf($_POST["us_cpf"]);
                $model->setEmail($_POST["us_email"]);
                $model->setApelido($_POST["us_apelido"]);

                if($model->cadastrar()){
                    header("Location: ../Views/cadastrado.html");
                } else {
                    header("Location: ../Views/cadastroUsuario.php");
                }
                break;
            }
        }
    }
}
$controller = new usuarioController();
?>