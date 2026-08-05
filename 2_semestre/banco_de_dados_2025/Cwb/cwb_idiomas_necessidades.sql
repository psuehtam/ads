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