<?php
require_once 'config.php';
require_once 'funcoes.php';

session_start();
$mensagem = '';
if (!empty($_SESSION['flash'])) {
    $mensagem = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$busca = trim($_GET['busca'] ?? '');

if (!empty($busca)) {
    $produtos = buscarPorNome($pdo, $busca);
} else {
    $produtos = listarProdutos($pdo);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        a { margin-right: 15px; }
        table { border-collapse: collapse; margin-top: 20px; width: 100%; max-width: 800px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 8px; }
        input[type="submit"] { padding: 8px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        .link-detalhes { color: #0066cc; text-decoration: none; }
        .link-detalhes:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h2>Lista de Produtos</h2>
    
    <?php if (!empty($mensagem)): ?>
        <p style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; border: 1px solid #c3e6cb;">
            <?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>
    
    <p>
        <a href="cadastrar.php">Cadastrar novo produto</a> |
        <a href="buscar.php">Busca avançada</a>
    </p>
    
    <form method="get">
        <input type="text" name="busca" placeholder="Buscar por nome..." 
               value="<?= htmlspecialchars($busca, ENT_QUOTES, 'UTF-8') ?>">
        <input type="submit" value="Buscar">
        <?php if (!empty($busca)): ?>
            <a href="index.php">Limpar busca</a>
        <?php endif; ?>
    </form>
    
    <?php if (empty($produtos)): ?>
        <p><em>Nenhum produto cadastrado ainda.</em></p>
    <?php else: ?>
        <p><strong>Produtos encontrados: <?= count($produtos) ?></strong></p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $p): ?>
                <tr>
                    <td><?= (int) $p['id'] ?></td>
                    <td><?= htmlspecialchars($p['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                    <td><?= (int) $p['quantidade'] ?></td>
                    <td>
                        <a href="detalhes.php?id=<?= (int) $p['id'] ?>" class="link-detalhes">Ver</a> |
                        <a href="editar.php?id=<?= (int) $p['id'] ?>" class="link-detalhes">Editar</a> |
                        <a href="excluir.php?id=<?= (int) $p['id'] ?>" class="link-detalhes" style="color: red;">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
