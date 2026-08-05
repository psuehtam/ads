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
</head>
<body>
    <h2>Detalhes do Produto</h2>

    <?php if ($produto): ?>
        <p><strong>ID:</strong> <?= (int) $produto['id'] ?></p>
        <p><strong>Nome:</strong> <?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>Preco:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
        <p><strong>Quantidade:</strong> <?= (int) $produto['quantidade'] ?></p>
        <p><strong>Criado em:</strong> <?= htmlspecialchars($produto['criado_em'], ENT_QUOTES, 'UTF-8') ?></p>
    <?php else: ?>
        <p>Produto nao encontrado.</p>
    <?php endif; ?>

    <br>
    <a href="index.php">Voltar</a>
</body>
</html>
