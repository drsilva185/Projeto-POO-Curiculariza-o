<?php
require_once('../models/Orgaos.php');

class ProdutoController {
    private $produtoModel;

    public function __construct() {
        
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->produtoModel = new Produto();
    }


    public function listar() {
        $produtos = $this->produtoModel->getTodos();
        require_once('../views/cliente/listaOrgaos.php');
    }
}

$controller = new ProdutoController();
$controller->listar();
?>