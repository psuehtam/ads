-- Questão 1) Criar a base de dados e prepará-la para uso.

CREATE DATABASE cwb_idiomas;

use cwb_idiomas;

-- Questão 2) Criar as tabelas de acordo com o modelo lógico relacional idealizado na avaliação anterior, considerando as
-- restrições de integridade.

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
  nota DECIMAL(3,2),
  data_avaliacao DATETIME,
  FOREIGN KEY (professor_id) REFERENCES professor(id),
  FOREIGN KEY (turma_id) REFERENCES turma(id)
);

CREATE TABLE avaliacao_realizada (
  id INT AUTO_INCREMENT PRIMARY KEY,
  avaliacao_id INT NOT NULL,
  aluno_id INT NOT NULL,
  nota DECIMAL(3,2),
  data_entrega DATETIME,
  FOREIGN KEY (avaliacao_id) REFERENCES avaliacao(id),
  FOREIGN KEY (aluno_id) REFERENCES aluno(id)
);

CREATE TABLE boletim (
  id INT AUTO_INCREMENT PRIMARY KEY,
  aluno_id INT NOT NULL,
  resultado BOOLEAN,
  media_final DECIMAL(3,2),
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