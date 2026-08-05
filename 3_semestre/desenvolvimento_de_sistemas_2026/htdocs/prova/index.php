<?php
// ============================================================
// Exercícios 5 e 8: index.php
// Lista todos os filmes com filtro opcional por gênero
// ============================================================

require 'conexao.php';
require 'funcoes.php';

// Lê o filtro de gênero da URL ($_GET)
// Converte para int se preenchido, ou mantém null para listar tudo
$generoIdFiltro = isset($_GET['genero_id']) && $_GET['genero_id'] !== ''
    ? (int) $_GET['genero_id']
    : null;

$filmes  = listarFilmes($pdo, $generoIdFiltro);
$generos = listarGeneros($pdo);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Filmes</title>
    <style>
        body        { font-family: Arial, sans-serif; margin: 2rem; }
        h1          { margin-bottom: 1rem; }
        table       { border-collapse: collapse; width: 100%; }
        th, td      { border: 1px solid #ccc; padding: 0.5rem 1rem; text-align: left; }
        th          { background: #f0f0f0; }
        .filtro     { margin-bottom: 1rem; }
        .novo-link  { display: inline-block; margin-bottom: 1rem; }
    </style>
</head>
<body>

<h1>🎬 Catálogo de Filmes</h1>

<a class="novo-link" href="cadastrar.php">+ Novo filme</a>

<!-- Exercício 8: formulário de filtro por gênero (método GET) -->
<div class="filtro">
    <form method="GET" action="index.php">
        <label for="genero_id">Filtrar por gênero:</label>
        <select
            id="genero_id"
            name="genero_id"
            onchange="this.form.submit()"
        >
            <option value="">-- Todos --</option>
            <?php foreach ($generos as $genero): ?>
                <option
                    value="<?= (int) $genero['id'] ?>"
                    <?= (int) $genero['id'] === $generoIdFiltro ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($genero['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</div>

<!-- Exercício 5: tabela de filmes -->
<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Ano</th>
            <th>Duração</th>
            <th>Gênero</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($filmes)): ?>
            <tr>
                <td colspan="4">Nenhum filme encontrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($filmes as $filme): ?>
                <tr>
                    <td><?= htmlspecialchars($filme['titulo']) ?></td>
                    <td><?= htmlspecialchars($filme['ano']) ?></td>
                    <!-- Sufixo "min" na duração -->
                    <td><?= htmlspecialchars($filme['duracao_min']) ?> min</td>
                    <!-- Operador ?? para tratar gênero nulo -->
                    <td><?= htmlspecialchars($filme['genero'] ?? '(sem gênero)') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
