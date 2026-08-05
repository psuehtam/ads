-- ============================================================
-- Exercício 1: Criação do banco, tabelas e dados iniciais
-- ============================================================

CREATE DATABASE IF NOT EXISTS catalogo
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE catalogo;

-- Tabela de gêneros
CREATE TABLE IF NOT EXISTS generos (
    id   INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de filmes com chave estrangeira para generos
-- genero_id pode ser NULL (filme sem gênero classificado)
-- ON DELETE SET NULL: se o gênero for excluído, o filme fica sem gênero
CREATE TABLE IF NOT EXISTS filmes (
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo       VARCHAR(150) NOT NULL,
    ano          YEAR         NOT NULL,
    duracao_min  SMALLINT UNSIGNED NOT NULL,
    genero_id    INT UNSIGNED NULL DEFAULT NULL,
    CONSTRAINT fk_filmes_genero
        FOREIGN KEY (genero_id) REFERENCES generos(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- Inserção dos 5 gêneros
-- ============================================================

INSERT INTO generos (nome) VALUES
    ('Ação'),
    ('Comédia'),
    ('Drama'),
    ('Terror'),
    ('Documentário');

-- ============================================================
-- Inserção dos 9 filmes (distribuição sugerida)
-- Ação: 2 | Comédia: 2 | Drama: 2 | Terror: 1 | Doc: 1 | Sem gênero: 1
-- ============================================================

INSERT INTO filmes (titulo, ano, duracao_min, genero_id) VALUES
    -- Ação (id = 1)
    ('Projeto Sombra',       2021, 118, 1),
    ('Código Vermelho',      2019, 102, 1),
    -- Comédia (id = 2)
    ('A Grande Confusão',    2022, 95,  2),
    ('Férias em Desastre',   2020, 88,  2),
    -- Drama (id = 3)
    ('O Último Horizonte',   2018, 134, 3),
    ('Laços Partidos',       2023, 110, 3),
    -- Terror (id = 4)
    ('Casa dos Ecos',        2021, 97,  4),
    -- Documentário (id = 5)
    ('Oceanos em Silêncio',  2022, 85,  5),
    -- Sem gênero (NULL) — necessário para demonstrar o LEFT JOIN
    ('Misterioso Destino',   2020, 105, NULL);

-- ============================================================
-- Exercício 2: SELECT com INNER JOIN
-- Retorna título, ano e nome do gênero (somente filmes com gênero)
-- ============================================================

SELECT
    f.titulo,
    f.ano,
    g.nome AS genero
FROM filmes f
INNER JOIN generos g ON f.genero_id = g.id
ORDER BY f.titulo;
