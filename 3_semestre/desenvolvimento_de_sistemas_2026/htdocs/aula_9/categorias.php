<?php
require_once 'config.php';
require_once 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');

    if ($nome !== '') {
        inserirCategoria($pdo, $nome);
        header('Location: categorias.php');
        exit;
    }
}

$categorias = listarCategorias($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Categorias</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Gerenciar categorias</h1>

    <div class="menu">
        <a href="index.php">Produtos</a>
        <a href="cadastrar.php">Cadastrar produto</a>
        <a href="fornecedores.php">Fornecedores</a>
        <a href="relatorio.php">Relatorio</a>
    </div>

    <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>
        <input type="submit" value="Cadastrar">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Acoes</th>
        </tr>

        <?php foreach ($categorias as $cat): ?>
            <tr>
                <td><?= (int) $cat['id'] ?></td>
                <td><?= htmlspecialchars($cat['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="acoes">
                    <a href="editar_categoria.php?id=<?= (int) $cat['id'] ?>">Editar</a>
                    <a href="excluir_categoria.php?id=<?= (int) $cat['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
