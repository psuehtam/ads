-- Questão 3) Inserir pelo menos 5 registros em cada tabela (INSERT).

use cwb_idiomas;

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