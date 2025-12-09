<?php

require_once('../../config/Database.php');

class Produto {
    private $conn;
    private $tabela = 'unidades_seguranca';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    
    public function getPorId($id) {
        $query = "SELECT id, tipo_unidade, nome, endereco, telefone, imagem_url FROM " . $this->tabela . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        
        if ($stmt === false) {
            return null;
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        }
        return null;
    }

 
    public function atualizar($id, $dados) {
        
        $query = "UPDATE " . $this->tabela . " 
                  SET tipo_unidade=?, nome=?, endereco=?, telefone=?, imagem_url=?
                  WHERE id=?";
        
        $stmt = $this->conn->prepare($query); 
        
        if ($stmt === false) {
            echo "ERRO AO PREPARAR UPDATE: " . $this->conn->error;
            return false;
        }
        
        $tipo_unidade = htmlspecialchars(strip_tags($dados['tipo_unidade']));
        $nome = htmlspecialchars(strip_tags($dados['nome']));
        $endereco = htmlspecialchars(strip_tags($dados['endereco']));
        $telefone = htmlspecialchars(strip_tags($dados['telefone']));
        $imagem_url = isset($dados['imagem_url']) ? $dados['imagem_url'] : ''; 

        
        $stmt->bind_param("sssssi",$tipo_unidade, $nome, $endereco, $telefone, $imagem_url, $id);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        }
        
        echo "ERRO AO EXECUTAR UPDATE: " . $stmt->error;
        $stmt->close();
        return false;       
    }

   
    public function deletar($id) {
        $query = "DELETE FROM " . $this->tabela . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        
        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        }
        
        $stmt->close();
        return false;
    }

    
        public function getTodos() {
            $query = "SELECT id, tipo_unidade, nome, endereco, telefone, imagem_url FROM " . $this->tabela . " ORDER BY id DESC";
            
            
            $resultado = $this->conn->query($query);
            
 
            if ($resultado === false) {
                
                return; 
            }
            
           
            return $resultado->fetch_all(MYSQLI_ASSOC); 
        }
    

   
    public function salvar($dados) {
        
        $query = "INSERT INTO " . $this->tabela . " 
                  SET tipo_unidade=?, nome=?, endereco=?, telefone=?, imagem_url=?";

        
        $stmt = $this->conn->prepare($query); 
        
        
        if ($stmt === false) {
            
            echo "ERRO FATAL NA QUERY SQL: " . $this->conn->error;
            return false;
        }
       
        $tipo_unidade = htmlspecialchars(strip_tags($dados['tipo_unidade']));
        $nome = htmlspecialchars(strip_tags($dados['nome']));
        $endereco = htmlspecialchars(strip_tags($dados['endereco']));
        $telefone = htmlspecialchars(strip_tags($dados['telefone']));
        $imagem_url = isset($dados['imagem_url']) ? $dados['imagem_url'] : ''; 
   
        $stmt->bind_param("sssss", $tipo_unidade, $nome, $endereco, $telefone, $imagem_url);

    
        if ($stmt->execute()) {
            $stmt->close(); 
            return true;
        }
        
  
        $error_message = $stmt->error;
        $stmt->close(); 
        
       
        echo "<h2>ERRO CRÍTICO (EXECUTE):</h2>";
        die("Mensagem do MySQLi: " . $error_message); 
        
        return false;
    }
}
?>