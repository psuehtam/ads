<?php
require_once 'config.php';
require_once 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome !== '') {
        inserirFornecedor($pdo, $nome, $telefone);
        header('Location: fornecedores.php');
        exit;
    }
}

$fornecedores = listarFornecedores($pdo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Fornecedores</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Gerenciar fornecedores</h1>

    <div class="menu">
        <a href="index.php">Produtos</a>
        <a href="cadastrar.php">Cadastrar produto</a>
        <a href="categorias.php">Categorias</a>
        <a href="relatorio.php">Relatorio</a>
    </div>

    <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone">

        <input type="submit" value="Cadastrar">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Acoes</th>
        </tr>

        <?php foreach ($fornecedores as $fornecedor): ?>
            <tr>
                <td><?= (int) $fornecedor['id'] ?></td>
                <td><?= htmlspecialchars($fornecedor['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($fornecedor['telefone'] ?: '-', ENT_QUOTES, 'UTF-8') ?></td>
                <td class="acoes">
                    <a href="editar_fornecedor.php?id=<?= (int) $fornecedor['id'] ?>">Editar</a>
                    <a href="excluir_fornecedor.php?id=<?= (int) $fornecedor['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
