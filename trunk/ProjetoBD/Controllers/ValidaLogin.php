<?php
include_once ("../Dao/UsuarioDAO.php");

class ValidaLogin {

    function __construct() {
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];

        $model = new UsuarioDAO();

        $resultado = $model->valida($email, $cpf);

        if ($resultado) {
            include_once '../Views/sessaoCliente.php';
        } else {
            setcookie("erro");
            include_once '../Views/login.php';
        }
    }
}

$controle = new ValidaLogin();
?>