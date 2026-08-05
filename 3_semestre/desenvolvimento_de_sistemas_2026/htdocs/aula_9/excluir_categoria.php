<?php
require_once 'config.php';
require_once 'funcoes.php';

$id = (int) ($_GET['id'] ?? 0);
$categoria = buscarCategoria($pdo, $id);

if (!$categoria) {
    die('Categoria não encontrada.');
}

if (isset($_POST['confirmar'])) {
    excluirCategoria($pdo, $id);

    header('Location: categorias.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Excluir Categoria</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Excluir categoria</h1>

    <div class="menu">
        <a href="index.php">Produtos</a>
        <a href="categorias.php">Categorias</a>
        <a href="fornecedores.php">Fornecedores</a>
    </div>

    <p>Excluir categoria <strong><?= htmlspecialchars($categoria['nome'], ENT_QUOTES, 'UTF-8') ?></strong>?</p>

    <form method="post">
        <input type="submit" name="confirmar" value="Confirmar exclusao">
        <a href="categorias.php">Cancelar</a>
    </form>
</div>
</body>
</html>
