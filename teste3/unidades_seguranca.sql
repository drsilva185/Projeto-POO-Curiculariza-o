CREATE TABLE unidades_seguranca (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo_unidade VARCHAR(50) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    imagem_url varchar(255) DEFAULT NULL
);