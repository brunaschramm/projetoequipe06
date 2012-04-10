<?php

include_once ("../Dao/ProdutoDAO.php");

class ProdutoController {

    function __construct() {
        $model = new ProdutoDAO();

        $acao = $_GET['acao'];

        switch ($acao) {
            case 'cadastrar':
                $model->setDescricao($_POST['descricao']);
                $model->setTitulo($_POST['titulo']);
                $model->setAno($_POST['ano']);
                $model->setPreco($_POST['preco']);
                $model->setFormato($_POST['formato']);
                $model->setGenero($_POST['genero']);
                $model->setCensura($_POST['censura']);
                $model->setRegiao($_POST['regiao']);
                $model->setGrupo($_POST['grupo']);
                $model->setFabricante($_POST['fabricante']);
                $model->setLoja($_POST['loja']);
                $model->setFornecedor($_POST['fornecedor']);
                $model->setProdutora($_POST['produtora']);

                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/sessaoCliente.php?flag=jpro");
                } else {
                    header("Location: ../Views/sessaoCliente.php?flag=jpro&erro");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                header("Location: ../Views/sessaoCliente.php?flag=jpro");
                break;
        }
    }

    function getAllProdutos() {
        $model = new ProdutoDAO();

        $produtos = $model->getAll();

        return $produtos;
    }

}

$controle = new ProdutoController();
?>
