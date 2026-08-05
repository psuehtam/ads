<?php
require_once 'config.php';
require_once 'funcoes.php';

$categoriaFiltro = isset($_GET['categoria_id']) && $_GET['categoria_id'] !== ''
    ? (int) $_GET['categoria_id']
    : null;

$produtos = $categoriaFiltro
    ? listarProdutosPorCategoria($pdo, $categoriaFiltro)
    : listarProdutosComCategoria($pdo);

$categorias = listarCategorias($pdo);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Produtos cadastrados</h1>

        <div class="menu">
            <a href="index.php">Produtos</a>
            <a href="cadastrar.php">Cadastrar produto</a>
            <a href="categorias.php">Categorias</a>
            <a href="fornecedores.php">Fornecedores</a>
            <a href="relatorio.php">Relatorio</a>
        </div>

        <form method="get">
            <label for="categoria_id">Filtrar por categoria</label>
            <select name="categoria_id" id="categoria_id">
                <option value="">(todas)</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= (int) $cat['id'] ?>" <?= ((int) $cat['id'] === $categoriaFiltro) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nome'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Filtrar</button>

            <?php if ($categoriaFiltro !== null): ?>
                <a href="index.php">Limpar</a>
            <?php endif; ?>
        </form>

        <?php if (empty($produtos)): ?>
            <p>Nenhum produto cadastrado.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preco</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Fornecedor</th>
                    <th>Acoes</th>
                </tr>
                <?php foreach ($produtos as $p): ?>
                    <tr>
                        <td><?= (int) $p['id'] ?></td>
                        <td><?= htmlspecialchars($p['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                        <td><?= (int) $p['quantidade'] ?></td>
                        <td><?= htmlspecialchars($p['categoria'] ?? 'Sem categoria', ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($p['fornecedor'] ?? 'Sem fornecedor', ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="acoes">
                            <a href="detalhes.php?id=<?= (int) $p['id'] ?>">Ver</a>
                            <a href="editar.php?id=<?= (int) $p['id'] ?>">Editar</a>
                            <a href="excluir.php?id=<?= (int) $p['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
