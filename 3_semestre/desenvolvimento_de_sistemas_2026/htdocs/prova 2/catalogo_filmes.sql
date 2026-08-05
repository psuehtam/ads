CREATE DATABASE IF NOT EXISTS catalogo;
USE catalogo;

CREATE TABLE IF NOT EXISTS generos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    ano INT NOT NULL,
    genero_id INT NULL,
    FOREIGN KEY (genero_id)
        REFERENCES generos(id)
        ON DELETE SET NULL
);

INSERT INTO generos (nome) VALUES
('Ação'),
('Comédia'),
('Drama'),
('Terror'),
('Documentário');

INSERT INTO filmes (titulo, ano, genero_id) VALUES
('Missao Relampago', 2020, 1),
('Operacao Final', 2021, 1),

('Ferias Malucas', 2019, 2),
('Confusao na Escola', 2022, 2),

('Ultima Chance', 2018, 3),
('Dias de Inverno', 2023, 3),

('Casa Sombria', 2021, 4),

('Natureza Selvagem', 2020, 5),

('Filme Misterioso', 2024, NULL);

SELECT
    f.titulo,
    f.ano,
    g.nome AS genero
FROM filmes f
INNER JOIN generos g ON f.genero_id = g.id
ORDER BY f.titulo;
