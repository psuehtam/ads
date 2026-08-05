# SUMÁRIO - AULA 08

## Objetivo da Aula
Implementar o CRUD completo com UPDATE e DELETE.

---

## O que foi criado
- 4 arquivos SQL
- 8 arquivos PHP
- 2 arquivos de documentação
- 7 funções em `funcoes.php`
  - inserirProduto()
  - listarProdutos()
  - buscarProduto()
  - buscarPorNome()
  - atualizarProduto()
  - excluirProduto()
  - desativarProduto()
  - reativarProduto()
- Tabela `produtos` com coluna `ativo BOOLEAN DEFAULT TRUE`
- Soft delete com `ativo = FALSE`

---

## Desafios implementados

### Confirmação de edição
- `editar.php`
- `onsubmit="return confirm(...)"`
- alerta antes de UPDATE
- evita alterações acidentais

### Soft delete
- `funcoes.php` + `excluir.php`
- usa `UPDATE SET ativo = FALSE`
- dados podem ser restaurados
- listas filtram `WHERE ativo = TRUE`

### Confirmação por nome
- `excluir.php`
- campo de texto pede o nome do produto
- validação exige texto idêntico ao nome do banco
- reduz exclusões acidentais

---

## Segurança implementada
- Prepared statements
- htmlspecialchars() para XSS
- validação de tipos
- LIMIT 1 em UPDATE/DELETE
- confirmação em formulário
- confirmação por nome
- sessões para mensagens de sucesso
- rowCount() para verificar operações

---

## Como testar

### Pré-requisitos
1. XAMPP com Apache e MySQL
2. `http://localhost/phpmyadmin`
3. Executar `banco.sql`

### Teste rápido
Siga `TESTE_RAPIDO.md`.

### Teste completo
- validar links
- editar com confirmação
- excluir com nome errado
- excluir com nome correto
- conferir no phpMyAdmin

---

## Estrutura de arquivos

```
aula_08/
├── config.php         → Conexão
├── funcoes.php        → Funções CRUD
├── banco.sql          → Criar banco/tabela
├── index.php          → Lista
├── cadastrar.php      → CREATE
├── detalhes.php       → READ por ID
├── buscar.php         → READ por nome
├── editar.php         → UPDATE
├── excluir.php        → DELETE
├── banco_teste.sql    → Teste separado
├── diagnostico.php    → Detecta porta
├── exemplos_sql.sql   → Referência SQL
├── README.md          → Documentação
├── TESTE_RAPIDO.md    → Roteiro de testes
└── SUMARIO.md         → Este arquivo
```

---

## Dúvidas frequentes

**Por que usar soft delete?**  
Preserva histórico e permite restauração.

**Posso deletar fisicamente?**  
Sim, use `excluirProduto()`.

**Como reativar um produto?**  
Use `reativarProduto($pdo, $id)`.

**E se a porta for 3307?**  
Edite `config.php` e ajuste `$porta`.

---

## Observações

- `README.md` contém explicações detalhadas.
- `TESTE_RAPIDO.md` traz roteiro de testes.
- `exemplos_sql.sql` traz exemplos SQL.
