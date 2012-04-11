<?php

include_once("../Dao/RecomendacaoDAO.php");

class RecomendacaoController {

    function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        $acao = $_GET['acao'];

        $model = new RecomendacaoDAO();

        switch ($acao) {
            case 'cadastrar':
                $model->setNome($_POST['loj_nome']);
                $model->setEndereco($_POST['loj_endereco']);

                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/lojas.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroLoja.php?flag=t");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                if ($resultado == 1) {
                    header("Location: ../Views/lojas.php?flag=f");
                } else {
                    header("Location: ../Views/lojas.php?flag=t");
                }
                break;
            case 'recomendar':
                $_SESSION["codigo"] = 1;
                session_commit();
                
                $aux = $_SESSION["produto"];
                $produto = $aux[0];
                
                $usuario = $_SESSION["codigo"];
                
                foreach ($_POST["amigo"] as $campo => $valor) {
                    $$campo = $valor;
                    $resultado = $model->salvar($valor, $usuario, $produto["codigo"]);
                }
                
                header("Location: ../Views/sessaoCliente.php?flag=jdetal&id=" . $_GET["id"]);
                
                break;
        }
    }
}
$controle = new RecomendacaoController();
?>