<?php
require_once 'config.php';
require_once 'funcoes.php';

$id = (int) ($_GET['id'] ?? 0);
$categoria = buscarCategoria($pdo, $id);

if (!$categoria) {
    die('Categoria não encontrada.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');

    if ($nome !== '') {
        atualizarCategoria($pdo, $id, $nome);
        header('Location: categorias.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Categoria</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Editar categoria</h1>

    <div class="menu">
        <a href="index.php">Produtos</a>
        <a href="categorias.php">Categorias</a>
        <a href="fornecedores.php">Fornecedores</a>
    </div>

    <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($categoria['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>
