<?php
require_once 'config.php';
require_once 'funcoes.php';

$id = (int) ($_GET['id'] ?? 0);
$produto = buscarProduto($pdo, $id);
$categorias = listarCategorias($pdo);
$fornecedores = listarFornecedores($pdo);

if (!$produto) {
    die("Produto não encontrado. <a href='index.php'>Voltar</a>");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $preco = str_replace(',', '.', trim($_POST['preco'] ?? ''));
    $quantidade = trim($_POST['quantidade'] ?? '');
    $categoriaId = $_POST['categoria_id'] ?? '';
    $categoriaId = $categoriaId === '' ? null : (int) $categoriaId;
    $fornecedorId = $_POST['fornecedor_id'] ?? '';
    $fornecedorId = $fornecedorId === '' ? null : (int) $fornecedorId;

    if (validarCampos($nome, $preco, $quantidade)) {
        atualizarProduto(
            $pdo,
            $id,
            $nome,
            (float) $preco,
            (int) $quantidade,
            $categoriaId,
            $fornecedorId
        );

        header('Location: index.php');
        exit;
    }

    $produto = [
        'id' => $id,
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => $quantidade,
        'categoria_id' => $categoriaId,
        'fornecedor_id' => $fornecedorId,
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar produto</h1>

        <div class="menu">
            <a href="index.php">Produtos</a>
            <a href="categorias.php">Categorias</a>
            <a href="fornecedores.php">Fornecedores</a>
            <a href="relatorio.php">Relatorio</a>
        </div>

        <form method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>" required>

            <label for="preco">Preco</label>
            <input type="text" name="preco" id="preco" value="<?= htmlspecialchars((string) $produto['preco'], ENT_QUOTES, 'UTF-8') ?>" required>

            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" min="0" value="<?= (int) $produto['quantidade'] ?>" required>

            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id">
                <option value="">(sem categoria)</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= (int) $cat['id'] ?>" <?= ((int) $cat['id'] === (int) $produto['categoria_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nome'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="fornecedor_id">Fornecedor</label>
            <select name="fornecedor_id" id="fornecedor_id">
                <option value="">(sem fornecedor)</option>
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?= (int) $fornecedor['id'] ?>" <?= ((int) $fornecedor['id'] === (int) ($produto['fornecedor_id'] ?? 0)) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($fornecedor['nome'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Salvar">
            <a href="index.php">Cancelar</a>
        </form>
    </div>
</body>
</html>
