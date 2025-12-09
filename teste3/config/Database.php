<?php

class Database {
    private $host = "localhost"; 
    private $db_name = "orgaos_seguranca"; 
    private $username = "root"; 
    private $password = "usbw";
    public $conn;

    /**
     * @return mysqli|null
     */
    public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            
            if ($this->conn->connect_error) {
                throw new Exception("Erro de Conexão com o Banco de Dados: " . $this->conn->connect_error);
            }

            $this->conn->set_charset("utf8");

        } catch(Exception $exception) {
            echo $exception->getMessage();
            die();
        }
        
        return $this->conn;
    }
}
?>