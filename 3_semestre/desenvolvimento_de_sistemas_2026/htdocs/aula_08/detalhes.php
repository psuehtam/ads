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
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .detalhes { max-width: 600px; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        p { margin: 15px 0; }
        strong { color: #333; }
        a { color: #0066cc; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .erro { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Detalhes do Produto</h2>
    
    <?php if ($produto): ?>
        <div class="detalhes">
            <p><strong>ID:</strong> <?= (int) $produto['id'] ?></p>
            <p><strong>Nome:</strong> <?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <p><strong>Quantidade em estoque:</strong> <?= (int) $produto['quantidade'] ?></p>
            <p><strong>Criado em:</strong> <?= date('d/m/Y H:i', strtotime($produto['criado_em'])) ?></p>
        </div>
    <?php else: ?>
        <p class="erro">Produto não encontrado.</p>
    <?php endif; ?>
    
    <br>
    <a href="index.php">Voltar à lista de produtos</a>
</body>
</html>
