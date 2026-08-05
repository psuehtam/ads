<?php
require_once 'config.php';
require_once 'funcoes.php';

$id = (int) ($_GET['id'] ?? 0);
$fornecedor = buscarFornecedor($pdo, $id);

if (!$fornecedor) {
    die('Fornecedor nao encontrado.');
}

if (isset($_POST['confirmar'])) {
    excluirFornecedor($pdo, $id);
    header('Location: fornecedores.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Excluir Fornecedor</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Excluir fornecedor</h1>

    <div class="menu">
        <a href="index.php">Produtos</a>
        <a href="fornecedores.php">Fornecedores</a>
    </div>

    <p>Excluir fornecedor <strong><?= htmlspecialchars($fornecedor['nome'], ENT_QUOTES, 'UTF-8') ?></strong>?</p>
    <p>Telefone: <?= htmlspecialchars($fornecedor['telefone'] ?: '-', ENT_QUOTES, 'UTF-8') ?></p>

    <form method="post">
        <input type="submit" name="confirmar" value="Confirmar exclusao">
        <a href="fornecedores.php">Cancelar</a>
    </form>
</div>
</body>
</html>
