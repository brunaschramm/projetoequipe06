<?php
include_once ("loja.php");

class lojaModel extends loja{
    public function cadastrar() {
//        echo $this->nome . "\n" . $this->email . "\n" . $this->endereco;
        return true;
    }
}
$model = new lojaModel();
?>