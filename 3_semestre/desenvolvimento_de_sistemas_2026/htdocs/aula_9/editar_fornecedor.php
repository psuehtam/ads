<?php
require_once 'config.php';
require_once 'funcoes.php';

$id = (int) ($_GET['id'] ?? 0);
$fornecedor = buscarFornecedor($pdo, $id);

if (!$fornecedor) {
    die('Fornecedor nao encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome !== '') {
        atualizarFornecedor($pdo, $id, $nome, $telefone);
        header('Location: fornecedores.php');
        exit;
    }

    $fornecedor = [
        'id' => $id,
        'nome' => $nome,
        'telefone' => $telefone,
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Fornecedor</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Editar fornecedor</h1>

    <div class="menu">
        <a href="index.php">Produtos</a>
        <a href="fornecedores.php">Fornecedores</a>
    </div>

    <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($fornecedor['nome'], ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($fornecedor['telefone'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>
