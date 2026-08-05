<?php
require_once 'config.php';
require_once 'funcoes.php';

$termo = trim($_GET['busca'] ?? '');
$produtos = $termo !== '' ? buscarPorNome($pdo, $termo) : [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Buscar Produtos</title>
</head>
<body>
    <h2>Buscar Produtos</h2>

    <form method="get">
        <input type="text" name="busca" value="<?= htmlspecialchars($termo, ENT_QUOTES, 'UTF-8') ?>">
        <input type="submit" value="Buscar">
    </form>

    <?php if ($termo !== ''): ?>
        <p><?= count($produtos) ?> encontrado(s)</p>

        <?php if (!empty($produtos)): ?>
            <ul>
                <?php foreach ($produtos as $p): ?>
                <li>
                    <?= htmlspecialchars($p['nome'], ENT_QUOTES, 'UTF-8') ?>
                    - R$ <?= number_format($p['preco'], 2, ',', '.') ?>
                    - <?= (int) $p['quantidade'] ?>
                    <a href="detalhes.php?id=<?= (int) $p['id'] ?>">Ver detalhes</a>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    <?php endif; ?>

    <br>
    <a href="index.php">Voltar</a>
</body>
</html>
