<?php

include_once ("../Dao/UsuarioDAO.php");

class ValidaLogin {

    function __construct() {
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];

        $model = new UsuarioDAO();

        $resultado = $model->valida($email, $cpf);

        if ($resultado) {
            header("Location: ../Views/sessaoCliente.php");
        } else {
            echo "Erro no Login";
        }
    }
}

$controle = new ValidaLogin();
?>