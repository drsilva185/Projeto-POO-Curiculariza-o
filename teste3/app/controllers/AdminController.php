<?php
require_once(__DIR__ . '/../../config/Database.php');
require_once(__DIR__ . '/../models/Orgaos.php');

class AdminController {
    private $produtoModel;

    public function __construct() {   
        if (!isset($_SESSION)) {
            session_start();
        }
        
        $this->produtoModel = new Produto();
    }

    public function adicionarView() {
        require_once('../views/admin/adicionarOrgaos.php');
    }

    public function editarView() {
        if (!isset($_GET['id'])) {
            header('Location: AdminController.php?action=gerenciar');
            exit;
        }

        $id = intval($_GET['id']);
        $produto = $this->produtoModel->getPorId($id);

        if (!$produto) {
            header('Location: AdminController.php?action=gerenciar');
            exit;
        }
        require_once(__DIR__ . '/../views/admin/editarOrgaos.php');
    }


    public function deletar() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            
            $produto = $this->produtoModel->getPorId($id);

            if ($produto) {

                if ($this->produtoModel->deletar($id)) {
                    $caminho_imagem = __DIR__ . '/../../public/img/' . $produto['imagem_url'];
                    if (file_exists($caminho_imagem) && $produto['imagem_url'] !== 'default.jpg') {
                        unlink($caminho_imagem);
                    }
                }
            }
        }
        header('Location: AdminController.php?action=gerenciar');
        exit;
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $dados = $_POST;
            $nome_imagem_bd = isset($dados['imagem_url_existente']) ? $dados['imagem_url_existente'] : ''; // Pega o nome antigo se for edição
            $is_update = isset($dados['id']) && !empty($dados['id']);
            
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                
                $imagem = $_FILES['imagem'];
                $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
                $nome_arquivo_unico = uniqid() . "." . $extensao;
                $caminho_destino = __DIR__ . '/../../public/img/' . $nome_arquivo_unico; 

                if (move_uploaded_file($imagem['tmp_name'], $caminho_destino)) {
                    $nome_imagem_bd = $nome_arquivo_unico;
                    
                    if ($is_update && !empty($dados['imagem_url_existente']) && $dados['imagem_url_existente'] !== 'default.jpg') {
                        $caminho_antigo = __DIR__ . '/../../public/img/' . $dados['imagem_url_existente'];
                        if (file_exists($caminho_antigo)) {
                            unlink($caminho_antigo);
                        }
                    }
                } else {
                    header('Location: AdminController.php?action=adicionarView&error=uploadfail');
                    exit;
                }
            }

            $dados['imagem_url'] = $nome_imagem_bd; 

            if ($is_update) {
                $this->produtoModel->atualizar($dados['id'], $dados);
            } else {
                $this->produtoModel->salvar($dados);
            }

            header('Location: AdminController.php?action=gerenciar');
            exit;
        }
    }
    

    public function gerenciar() {
        $produtos = $this->produtoModel->getTodos();
        
        require_once('../views/admin/gerenciarOrgaos.php');
    }

}

$action = isset($_GET['action']) ? $_GET['action'] : 'gerenciar';

$controller = new AdminController();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->gerenciar();
}
?>