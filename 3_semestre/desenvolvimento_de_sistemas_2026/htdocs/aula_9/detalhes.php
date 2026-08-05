<?php
require_once 'config.php';
require_once 'funcoes.php';

$produto = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    $produto = buscarProduto($pdo, $id);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Detalhes do produto</h1>

        <div class="menu">
            <a href="index.php">Produtos</a>
            <a href="cadastrar.php">Cadastrar produto</a>
            <a href="categorias.php">Categorias</a>
            <a href="fornecedores.php">Fornecedores</a>
            <a href="relatorio.php">Relatorio</a>
        </div>

        <?php if ($produto): ?>
            <p><strong>ID:</strong> <?= (int) $produto['id'] ?></p>
            <p><strong>Nome:</strong> <?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Preco:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <p><strong>Quantidade:</strong> <?= (int) $produto['quantidade'] ?></p>
            <p><strong>Categoria:</strong> <?= htmlspecialchars($produto['categoria'] ?? 'Sem categoria', ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Fornecedor:</strong> <?= htmlspecialchars($produto['fornecedor'] ?? 'Sem fornecedor', ENT_QUOTES, 'UTF-8') ?></p>
        <?php else: ?>
            <p>Produto nao encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
