<?php
session_start();
include_once ("../Dao/UsuarioDAO.php");

class ValidaLogin {

    function __construct() {
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];

        $model = new UsuarioDAO();

        $resultado = $model->valida($email, $cpf);

        if ($resultado) {
            header ('Location: ../Views/sessaoCliente.php');
        } else {
            $_SESSION["login"] = false;
            session_commit();
            header ('Location: ../Views/sessaoCliente.php?flag=jlogin');
        }
    }
}

$controle = new ValidaLogin();
?>