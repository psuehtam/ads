<?php
require_once 'config.php';
require_once 'funcoes.php';

$id = (int) ($_GET['id'] ?? 0);
$produto = buscarProduto($pdo, $id);

if (!$produto) {
    die("Produto não encontrado. <a href='index.php'>Voltar</a>");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    excluirProduto($pdo, $id);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Excluir produto</h1>

        <div class="menu">
            <a href="index.php">Produtos</a>
            <a href="categorias.php">Categorias</a>
            <a href="fornecedores.php">Fornecedores</a>
        </div>

        <p>Excluir produto <strong><?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></strong>?</p>
        <p>Categoria: <?= htmlspecialchars($produto['categoria'] ?? 'Sem categoria', ENT_QUOTES, 'UTF-8') ?></p>
        <p>Fornecedor: <?= htmlspecialchars($produto['fornecedor'] ?? 'Sem fornecedor', ENT_QUOTES, 'UTF-8') ?></p>

        <form method="post">
            <input type="submit" value="Confirmar exclusao">
            <a href="index.php">Cancelar</a>
        </form>
    </div>
</body>
</html>
