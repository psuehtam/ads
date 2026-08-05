-- Questão 1) Criar a base de dados e prepará-la para uso.


CREATE DATABASE cwb_idiomas;

use cwb_idiomas;


-- Questão 2) Criar as tabelas de acordo com o modelo lógico relacional idealizado na avaliação anterior, considerando as restrições de integridade.


CREATE TABLE responsavel (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11),
  data_nascimento DATE,
  email VARCHAR(100),
  endereco VARCHAR(255)
);

CREATE TABLE aluno (
  id INT AUTO_INCREMENT PRIMARY KEY,
  responsavel_id INT NULL,
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11),
  data_nascimento DATE,
  email VARCHAR(100),
  endereco VARCHAR(255),
	FOREIGN KEY (responsavel_id) 
	REFERENCES responsavel(id)
);

CREATE TABLE telefone_aluno (
  aluno_id INT NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  PRIMARY KEY (aluno_id, telefone),
  FOREIGN KEY (aluno_id) REFERENCES aluno(id)
);

CREATE TABLE telefone_responsavel (
  responsavel_id INT NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  PRIMARY KEY (responsavel_id, telefone),
  FOREIGN KEY (responsavel_id) REFERENCES responsavel(id)
);

CREATE TABLE professor (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11),
  email VARCHAR(100),
  especialidade VARCHAR(100)
);

CREATE TABLE curso (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nivel VARCHAR(20),
  carga_horaria INT,
  valor DECIMAL(10,2)
);

CREATE TABLE turma (
  id INT AUTO_INCREMENT PRIMARY KEY,
  curso_id INT NOT NULL,
  professor_id INT NOT NULL,
  codigo VARCHAR(20),
  horario TIME,
  sala VARCHAR(20),
  capacidade_max INT,
  FOREIGN KEY (curso_id) REFERENCES curso(id),
  FOREIGN KEY (professor_id) REFERENCES professor(id)
);

CREATE TABLE aula (
  id INT AUTO_INCREMENT PRIMARY KEY,
  turma_id INT NOT NULL,
  data_aula DATE NOT NULL,
  horario_inicio TIME,
  horario_fim TIME,
  conteudo VARCHAR(255),
  FOREIGN KEY (turma_id) REFERENCES turma(id)
);

CREATE TABLE matricula (
  id INT AUTO_INCREMENT PRIMARY KEY,
  aluno_id INT NOT NULL,
  turma_id INT NOT NULL,
  data_entrada DATE,
  data_saida DATE NULL,
  status_matricula ENUM('ativa','concluida','trancada','cancelada') DEFAULT 'ativa',
  FOREIGN KEY (aluno_id) REFERENCES aluno(id),
  FOREIGN KEY (turma_id) REFERENCES turma(id)
);

CREATE TABLE avaliacao (
  id INT AUTO_INCREMENT PRIMARY KEY,
  professor_id INT,
  turma_id INT,
  tipo VARCHAR(30),
  nota DECIMAL(4,2),
  data_avaliacao DATETIME,
  FOREIGN KEY (professor_id) REFERENCES professor(id),
  FOREIGN KEY (turma_id) REFERENCES turma(id)
);

CREATE TABLE avaliacao_realizada (
  id INT AUTO_INCREMENT PRIMARY KEY,
  avaliacao_id INT NOT NULL,
  aluno_id INT NOT NULL,
  nota DECIMAL(4,2),
  data_entrega DATETIME,
  FOREIGN KEY (avaliacao_id) REFERENCES avaliacao(id),
  FOREIGN KEY (aluno_id) REFERENCES aluno(id)
);

CREATE TABLE boletim (
  id INT AUTO_INCREMENT PRIMARY KEY,
  aluno_id INT NOT NULL,
  resultado BOOLEAN,
  media_final DECIMAL(4,2),
  frequencia_presenca BOOLEAN,
  FOREIGN KEY (aluno_id) REFERENCES aluno(id)
);

CREATE TABLE frequencia (
  aluno_id INT NOT NULL,
  turma_id INT NOT NULL,
  data_aula DATETIME,
  presenca BOOLEAN,
  PRIMARY KEY (aluno_id, turma_id, data_aula),
  FOREIGN KEY (aluno_id) REFERENCES aluno(id),
  FOREIGN KEY (turma_id) REFERENCES turma(id)
);

CREATE TABLE forma_pagamento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  forma VARCHAR(100)
);

CREATE TABLE status_pagamento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  status VARCHAR(100)
);

CREATE TABLE pagamento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  matricula_id INT NOT NULL,
  forma_pagamento_id INT,
  status_pagamento_id INT,
  data_pagamento DATETIME NULL,
  valor_pago DECIMAL(10,2),
  FOREIGN KEY (matricula_id) REFERENCES matricula(id),
  FOREIGN KEY (forma_pagamento_id) REFERENCES forma_pagamento(id),
  FOREIGN KEY (status_pagamento_id) REFERENCES status_pagamento(id)
);


-- Questão 3) Inserir pelo menos 5 registros em cada tabela (INSERT).


INSERT INTO responsavel (nome, cpf, data_nascimento, email, endereco) VALUES
('Matheus Pupia','57838460310','1980-05-10','matheus@gmail.com','Rua A, 100'),
('Gabriel Henrique Alves Raatz','42591267251','1975-09-12','gabriel@gmail.com','Rua B, 200'),
('Walter Potma de Brito','47204688538','1985-07-22','walter@gmail.com','Rua C, 300'),
('Samuel Baez','05914833868','1995-04-10','samuel@gmail.com','Rua D, 400'),
('Nicola Cage','62593635169','1989-07-16','nicolas@gmail.com','Rua E, 500');

INSERT INTO aluno (responsavel_id, nome, cpf, data_nascimento, email, endereco) VALUES
(1, 'Carlos Eduardo Rosa','17185464404','2010-03-20','carlos@gmail.com','Rua A, 100'),
(2, 'Fernando Araujo','67308771385','2008-08-11','fernando@gmail.com','Rua B, 200'),
(3, 'Gustavo Lima','38643784869','2007-12-03','gustavo@gmail.com','Rua C, 300'),
(4, 'Helena Coradassi','43577841230','2006-06-14','helena@gmail.com','Rua D, 400'),
(5, 'Igor Jesus','82567713301','2005-09-01','igor@gmail.com','Rua E, 500');

INSERT INTO telefone_aluno VALUES
(1,'41929084282'),
(2,'41930464160'),
(3,'41927413915'),
(4,'41924758624'),
(5,'41927909552');

INSERT INTO telefone_responsavel VALUES
(1,'41921843252'),
(2,'41933161187'),
(3,'41938868875'),
(4,'41933645875'),
(5,'41923325355');

INSERT INTO professor (nome,cpf,email,especialidade) VALUES
('Evandro Alberto Zatti','12345678901','evandro.z@cwb.com','Inglês Intermediário'),
('Fabricio Gabriel Olivo','98765432100','fabrici.oo@cwb.com','Conversação'),
('Aryel Marlus Repula de Oliveira','78945612300','aryel.o@cwb.com','Gramática'),
('Gustavo Abreu Caetano','45678912300','gustavo.c@cwb.com','Business English'),
('Gustavo Marchevisk','85236974100','gustavo.m@cwb.com','Inglês Avançado');

INSERT INTO curso (nivel,carga_horaria,valor) VALUES
('Book 1',40,300.00),
('Book 2',40,350.00),
('Book 3',40,400.00),
('Book 4',40,450.00),
('Conversation',30,400.00);

INSERT INTO turma (curso_id,professor_id,codigo,horario,sala,capacidade_max) VALUES
(1,1,'B1-01','18:30:00','A1',10),
(2,2,'B2-02','19:30:00','A2',10),
(3,3,'B3-03','20:30:00','A3',10),
(4,4,'B4-04','18:00:00','A4',10),
(5,5,'C1-05','17:00:00','A5',10);

INSERT INTO aula (turma_id,data_aula,horario_inicio,horario_fim,conteudo) VALUES
(1,'2025-08-01','18:30:00','20:00:00','Unit 1 - Greetings'),
(2,'2025-08-02','19:30:00','21:00:00','Unit 2 - Present Simple'),
(3,'2025-08-03','20:30:00','22:00:00','Unit 3 - Past Tense'),
(4,'2025-08-04','18:00:00','19:30:00','Unit 4 - Vocabulary'),
(5,'2025-08-05','17:00:00','18:30:00','Unit 5 - Conversation Practice');

INSERT INTO matricula (aluno_id,turma_id,data_entrada, data_saida, status_matricula) VALUES
(1,1,'2025-08-01', NULL, 'ativa'),
(2,2,'2025-08-01',NULL,'ativa'),
(3,3,'2025-08-01',NULL,'ativa'),
(4,4,'2025-08-01',NULL,'trancada'),
(5,5,'2025-08-01',NULL,'ativa');

INSERT INTO avaliacao (professor_id,turma_id,tipo,nota,data_avaliacao) VALUES
(1,1,'Prova 1',NULL,'2025-08-10 09:00:00'),
(2,2,'Prova 2',NULL,'2025-08-15 09:00:00'),
(3,3,'Quiz',NULL,'2025-08-20 09:00:00'),
(4,4,'Trabalho',NULL,'2025-08-25 09:00:00'),
(5,5,'Apresentação',NULL,'2025-08-30 09:00:00');

INSERT INTO avaliacao_realizada (avaliacao_id,aluno_id,nota,data_entrega) VALUES
(1,1,8.5,'2025-08-10 11:00:00'),
(2,2,7.0,'2025-08-15 10:30:00'),
(3,3,9.0,'2025-08-20 11:15:00'),
(4,4,6.5,'2025-08-25 10:45:00'),
(5,5,8.0,'2025-08-30 11:30:00');

INSERT INTO boletim (aluno_id,resultado,media_final,frequencia_presenca) VALUES
(1,TRUE,8.5,TRUE),
(2,TRUE,7.0,TRUE),
(3,TRUE,9.0,TRUE),
(4,FALSE,6.5,FALSE),
(5,TRUE,8.0,TRUE);

INSERT INTO frequencia (aluno_id,turma_id,data_aula,presenca) VALUES
(1,1,'2025-08-01',TRUE),
(2,2,'2025-08-02',TRUE),
(3,3,'2025-08-03',TRUE),
(4,4,'2025-08-04',FALSE),
(5,5,'2025-08-05',TRUE);

INSERT INTO forma_pagamento (forma) VALUES
('Dinheiro'),
('Cartão de Débito'),
('Cartão de Crédito'),
('PIX'),
('Transferência');

INSERT INTO status_pagamento (status) VALUES
('Pago'),
('Pendente'),
('Parcial'),
('Atrasado'),
('Cancelado');

INSERT INTO pagamento (matricula_id,forma_pagamento_id,status_pagamento_id,data_pagamento,valor_pago) VALUES
(1,3,1,'2025-08-02',600.00),
(2,2,2,NULL,0.00),
(3,1,1,'2025-08-03',700.00),
(4,4,4,NULL,0.00),
(5,5,1,'2025-08-05',500.00);


-- Questão 4) Elaborar pelo menos 10 necessidades negociais que a base deve atender.


-- Necessidade 1: Listar o nome dos alunos com o nome do responsável em ordem alfabética com o telefone de cada um.
SELECT
  a.nome AS Aluno,
  ta.telefone AS Telefone_Aluno,
  r.nome AS Responsavel,
  tr.telefone AS Telefone_Responsavel
FROM
  aluno a
  JOIN responsavel r ON r.id = a.responsavel_id
  JOIN telefone_aluno ta ON a.id = ta.aluno_id
  JOIN telefone_responsavel tr ON r.id = tr.responsavel_id
ORDER BY
  a.nome;
  
-- Necessidade 2: Listar o nome dos professores e suas turmas.
SELECT 
  p.nome AS Professor, 
  t.codigo AS Turma
FROM 
  professor p
  JOIN turma t ON t.professor_id = p.id
ORDER BY 
  p.nome;

-- Necessidade 3: Aumentar em 10% o valor de todos os cursos.
UPDATE curso
SET valor = valor * 1.10;

-- Necessidade 4: Excluir formas de pagamento que não estão vinculadas a nenhum pagamento.
DELETE FROM forma_pagamento
WHERE id NOT IN (
  SELECT DISTINCT forma_pagamento_id
  FROM pagamento
  WHERE forma_pagamento_id IS NOT NULL
);

-- Necessidade 5: Listar todas as aulas de uma turma específica, ordenadas pela data.
SELECT 
    data_aula,
    conteudo
FROM 
    aula
WHERE 
    turma_id = 1
ORDER BY 
    data_aula;

-- Necessidade 6: Listar todos os pagamentos com o nome do aluno e o status.
SELECT 
  a.nome AS Aluno, 
  sp.status, 
  p.valor_pago, 
  p.data_pagamento
FROM 
  pagamento p
  JOIN matricula m ON m.id = p.matricula_id
  JOIN aluno a ON a.id = m.aluno_id
  JOIN status_pagamento sp ON sp.id = p.status_pagamento_id;

-- Necessidade 7: Mostrar quantos alunos existe por nível de curso.
SELECT 
  c.nivel AS Curso, 
  COUNT(m.id) AS QuantidadeDeMatriculas
FROM 
  curso c
  JOIN turma t ON t.curso_id = c.id
  JOIN matricula m ON m.turma_id = t.id
GROUP BY 
  c.nivel;

-- Necessidade 8: Listar todas as avaliações e suas notas realizadas pelos alunos.
SELECT 
  ar.id, 
  a.tipo, 
  ar.nota, 
  ar.data_entrega
FROM 
  avaliacao_realizada ar
  JOIN avaliacao a ON a.id = ar.avaliacao_id
ORDER BY 
  ar.data_entrega;

-- Necessidade 9: Listar a frequência dos alunos mostrando presença ou falta.
SELECT 
  a.nome AS Aluno, 
  f.data_aula, 
  f.presenca
FROM 
  frequencia f
  JOIN aluno a ON a.id = f.aluno_id
ORDER BY 
  f.data_aula;

-- Necessidade 10: Listar as turmas com sua capacidade máxima.
SELECT 
  codigo AS Turma, 
  capacidade_max AS Capacidade
FROM 
  turma
ORDER BY 
  capacidade_max DESC;

-- Necessidade 11: Listar o nome do aluno, sua média final e se a frequência de presença foi atingida no boletim.
SELECT
  a.nome AS Aluno,
  b.media_final,
  b.frequencia_presenca
FROM
  boletim b
  JOIN aluno a ON a.id = b.aluno_id
ORDER BY
  a.nome; 