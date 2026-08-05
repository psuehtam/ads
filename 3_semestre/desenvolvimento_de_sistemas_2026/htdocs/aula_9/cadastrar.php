<?php
require_once 'config.php';
require_once 'funcoes.php';

$nome = '';
$preco = '';
$quantidade = '';
$categoriaId = null;
$fornecedorId = null;
$categorias = listarCategorias($pdo);
$fornecedores = listarFornecedores($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $preco = str_replace(',', '.', trim($_POST['preco'] ?? ''));
    $quantidade = trim($_POST['quantidade'] ?? '');
    $categoriaId = $_POST['categoria_id'] ?? '';
    $categoriaId = $categoriaId === '' ? null : (int) $categoriaId;
    $fornecedorId = $_POST['fornecedor_id'] ?? '';
    $fornecedorId = $fornecedorId === '' ? null : (int) $fornecedorId;

    if (validarCampos($nome, $preco, $quantidade)) {
        inserirProduto(
            $pdo,
            $nome,
            (float) $preco,
            (int) $quantidade,
            $categoriaId,
            $fornecedorId
        );

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de produto</h1>

        <div class="menu">
            <a href="index.php">Produtos</a>
            <a href="categorias.php">Categorias</a>
            <a href="fornecedores.php">Fornecedores</a>
            <a href="relatorio.php">Relatorio</a>
        </div>

        <form method="post">
            <label for="nome">Produto</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>" required>

            <label for="preco">Preco</label>
            <input type="text" name="preco" id="preco" value="<?= htmlspecialchars($preco, ENT_QUOTES, 'UTF-8') ?>" required>

            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" min="0" value="<?= htmlspecialchars((string) $quantidade, ENT_QUOTES, 'UTF-8') ?>" required>

            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id">
                <option value="">(sem categoria)</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= (int) $cat['id'] ?>" <?= ((int) $cat['id'] === (int) $categoriaId) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nome'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="fornecedor_id">Fornecedor</label>
            <select name="fornecedor_id" id="fornecedor_id">
                <option value="">(sem fornecedor)</option>
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?= (int) $fornecedor['id'] ?>" <?= ((int) $fornecedor['id'] === (int) $fornecedorId) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($fornecedor['nome'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
