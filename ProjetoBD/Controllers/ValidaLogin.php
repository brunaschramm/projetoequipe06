<?php

//include_once ("../Dao/UsuarioDAO.php");

class ValidaLogin {

    function __construct() {
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];

        //$model = new UsuarioDAO();
        
        //$resultado = $model->valida($email, $cpf);
        //if($resultado){
        if ($cpf == "00691023255" && $email == "brunabas22@gmail.com") {
            header("Location: ../Views/index.html");
        } else {
            echo "Erro no Login";
        }    
    }
}
$controle = new ValidaLogin();
?>