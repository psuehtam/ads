<?php
require_once 'config.php';
require_once 'funcoes.php';

$nome = '';
$preco = '';
$quantidade = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $preco = str_replace(',', '.', trim($_POST['preco'] ?? ''));
    $quantidade = trim($_POST['quantidade'] ?? '');

    if (validarCampos($nome, $preco, $quantidade)) {
        inserirProduto($pdo, $nome, (float) $preco, (int) $quantidade);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h2>Cadastro de Produto</h2>

    <form method="post">
        <label>Produto:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        <label>Preco:</label><br>
        <input type="text" name="preco" value="<?= htmlspecialchars($preco, ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" min="0" value="<?= htmlspecialchars($quantidade, ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <br>
    <a href="index.php">Ver todos os produtos</a> |
    <a href="buscar.php">Buscar por nome</a>
</body>
</html>
