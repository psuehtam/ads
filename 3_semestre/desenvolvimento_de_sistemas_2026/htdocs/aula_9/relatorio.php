<?php
require_once 'config.php';
require_once 'funcoes.php';

$dados = relatorioCategorias($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Relatório</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Relatorio por categoria</h1>

    <div class="menu">
        <a href="index.php">Produtos</a>
        <a href="cadastrar.php">Cadastrar produto</a>
        <a href="categorias.php">Categorias</a>
        <a href="fornecedores.php">Fornecedores</a>
    </div>

    <table>
        <tr>
            <th>Categoria</th>
            <th>Total de produtos</th>
        </tr>

        <?php foreach ($dados as $d): ?>
            <tr>
                <td><?= htmlspecialchars($d['categoria'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= (int) $d['total'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
