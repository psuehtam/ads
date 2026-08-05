<?php
require_once 'config.php';
require_once 'funcoes.php';

$busca = trim($_GET['busca'] ?? '');
$produtos = $busca !== '' ? buscarPorNome($pdo, $busca) : listarProdutos($pdo);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body>
    <h2>Lista de Produtos</h2>

    <p>
        <a href="cadastrar.php">Cadastrar produto</a> |
        <a href="buscar.php">Buscar por nome</a>
    </p>

    <form method="get">
        <input type="text" name="busca" value="<?= htmlspecialchars($busca, ENT_QUOTES, 'UTF-8') ?>">
        <input type="submit" value="Buscar">
        <?php if ($busca !== ''): ?>
            <a href="index.php">Limpar busca</a>
        <?php endif; ?>
    </form>

    <?php if ($busca !== ''): ?>
        <p><?= count($produtos) ?> encontrado(s)</p>
    <?php endif; ?>

    <?php if (empty($produtos)): ?>
        <p>Nenhum produto cadastrado.</p>
    <?php else: ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preco</th>
                <th>Quantidade</th>
                <th>Acoes</th>
            </tr>
            <?php foreach ($produtos as $p): ?>
                <tr>
                    <td><?= (int) $p['id'] ?></td>
                    <td><?= htmlspecialchars($p['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                    <td><?= (int) $p['quantidade'] ?></td>
                    <td><a href="detalhes.php?id=<?= (int) $p['id'] ?>">Ver detalhes</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
