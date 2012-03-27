<?php
include_once ("loja.php");

class lojaModel extends loja{
    public function cadastrar() {
        return true;
    }
}
$model = new lojaModel();
?>