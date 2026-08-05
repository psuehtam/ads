CREATE DATABASE IF NOT EXISTS loja
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE loja;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produtos (nome, preco, quantidade) VALUES
('Notebook', 3500.00, 10),
('Mouse Gamer', 150.00, 25),
('Teclado Mecânico', 350.00, 15),
('Monitor 24"', 1200.00, 8),
('Webcam HD', 180.00, 30);
