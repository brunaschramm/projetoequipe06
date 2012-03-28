<?php

include_once ("../Dao/UsuarioDAO.php");

class UsuarioController {

    public function __construct() {
        $acao = $_GET['acao'];
                
        $model = new UsuarioDAO();

        switch ($acao) {
            case 'cadastrar': 
                    $model->setNome($_POST["us_nome"]);
                    $model->setCpf($_POST["us_cpf"]);
                    $model->setEmail($_POST["us_email"]);
                    $model->setApelido($_POST["us_apelido"]);
                    
                    if ($model->salvar()) {
                        header("Location: ../Views/cadastrado.html");
                    } else {
                        header("Location: ../Views/cadastroUsuario.php");
                    }
                    break;                                                                            
        }
    }

}

$controller = new UsuarioController();
?>