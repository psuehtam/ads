<?php
require_once 'config.php';
require_once 'funcoes.php';

session_start();

$id = (int) ($_GET['id'] ?? 0);
$mensagem = '';
$produto = buscarProduto($pdo, $id);

if (!$produto) {
    die("<h2>Produto não encontrado.</h2> <a href='index.php'>Voltar</a>");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $preco = str_replace(',', '.', trim($_POST['preco'] ?? ''));
    $quantidade = trim($_POST['quantidade'] ?? '');
    
    if (!validarCampos($nome, $preco, $quantidade)) {
        $mensagem = "<p style='color:red;'>Preencha todos os campos corretamente.</p>";
    } else {
        $linhas = atualizarProduto($pdo, $id, $nome, (float) $preco, (int) $quantidade);
        if ($linhas > 0) {
            $_SESSION['flash'] = "Produto atualizado com sucesso!";
            header("Location: index.php");
            exit;
        } else {
            $mensagem = "<p style='color:orange;'>Nenhuma alteração foi feita.</p>";
        }
        $produto = ['id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-container { max-width: 500px; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        .buttons { margin-top: 20px; }
        input[type="submit"] { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 4px; }
        input[type="submit"]:hover { background-color: #45a049; }
        a { color: #0066cc; text-decoration: none; margin-left: 10px; }
        a:hover { text-decoration: underline; }
        .mensagem { padding: 10px; margin: 15px 0; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Editar Produto #<?= (int) $produto['id'] ?></h2>
    
    <?php if (!empty($mensagem)): ?>
        <div class="mensagem">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>
    
    <div class="form-container">
        <form method="post" onsubmit="return confirm('Tem certeza que deseja salvar as alterações em ' + document.querySelector('input[name=nome]').value + '?');">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
            
            <label>Preço (R$):</label>
            <input type="text" name="preco" value="<?= htmlspecialchars($produto['preco'], ENT_QUOTES, 'UTF-8') ?>" placeholder="Ex: 100,00" required>
            
            <label>Quantidade:</label>
            <input type="number" name="quantidade" min="0" value="<?= (int) $produto['quantidade'] ?>" required>
            
            <div class="buttons">
                <input type="submit" value="Salvar alterações">
                <a href="index.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
