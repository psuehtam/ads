
SELECT * FROM produtos WHERE id = 1;


UPDATE produtos
SET preco = 3999.00
WHERE id = 1 LIMIT 1;


SELECT * FROM produtos WHERE id = 1;


UPDATE produtos
SET nome = 'Notebook Gamer', preco = 4500.00, quantidade = 5
WHERE id = 1 LIMIT 1;


UPDATE produtos
SET preco = preco * 1.10
WHERE id = 2 LIMIT 1;


UPDATE produtos
SET quantidade = quantidade - 1
WHERE id = 3 LIMIT 1;


SELECT * FROM produtos WHERE id = 5;

DELETE FROM produtos
WHERE id = 5 LIMIT 1;


SELECT * FROM produtos WHERE id = 5;


UPDATE produtos
SET ativo = FALSE
WHERE id = 2 LIMIT 1;


SELECT * FROM produtos WHERE ativo = TRUE;
SELECT * FROM produtos;


UPDATE produtos
SET ativo = TRUE
WHERE id = 2 LIMIT 1;


SELECT * FROM produtos WHERE ativo = TRUE;


UPDATE produtos SET preco = 100 WHERE id = 1 LIMIT 1;


DELETE FROM produtos WHERE id = 1 LIMIT 1;

SELECT COUNT(*) FROM produtos WHERE id = 1;  -- 1 linha


UPDATE produtos SET ativo = FALSE;


UPDATE produtos SET ativo = TRUE;

UPDATE produtos SET quantidade = 0 WHERE ativo = TRUE;
