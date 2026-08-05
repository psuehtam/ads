CREATE DATABASE loja
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE loja;

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL UNIQUE
);

CREATE TABLE fornecedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    telefone VARCHAR(20)
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    categoria_id INT NULL,
    fornecedor_id INT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

INSERT INTO categorias (nome) VALUES
('Informatica'),
('Perifericos'),
('Audio');

INSERT INTO fornecedores (nome, telefone) VALUES
('Tech Distribuidora', '(41) 99999-1111'),
('Mega Hardware', '(41) 98888-2222'),
('Audio Premium', '(41) 97777-3333');

INSERT INTO produtos (nome, preco, quantidade, categoria_id, fornecedor_id) VALUES
('Notebook Gamer', 4500.00, 10, 1, 1),
('Mouse Gamer', 180.00, 30, 2, 2),
('Headset RGB', 320.00, 15, 3, 3),
('Monitor 24"', 1200.00, 8, 1, 1),
('Webcam HD', 200.00, 25, 2, 2),
('Brinde', 0.00, 50, NULL, NULL);
