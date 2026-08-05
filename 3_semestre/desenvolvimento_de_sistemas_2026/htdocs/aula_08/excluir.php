<?php
require_once 'config.php';
require_once 'funcoes.php';

session_start();

$id = (int) ($_GET['id'] ?? 0);
$erro = '';
$produto = buscarProduto($pdo, $id);

if (!$produto) {
    die("<h2>Produto não encontrado.</h2> <a href='index.php'>Voltar</a>");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $confirmacao = trim($_POST['confirmacao'] ?? '');
    
    if ($confirmacao !== $produto['nome']) {
        $erro = "<p style='color:red;'><strong>Erro:</strong> O nome do produto não confere. Digite exatamente: <strong>" . htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') . "</strong></p>";
    } else {
        desativarProduto($pdo, $id);
        $_SESSION['flash'] = "Produto " . htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') . " excluído com sucesso!";
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .confirmacao { max-width: 600px; background-color: #fff3cd; padding: 20px; border: 1px solid #ffc107; border-radius: 5px; }
        .aviso { color: red; font-weight: bold; margin: 15px 0; }
        input[type="text"] { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        .buttons { margin-top: 20px; }
        input[type="submit"] { padding: 10px 20px; background-color: #dc3545; color: white; border: none; cursor: pointer; border-radius: 4px; }
        input[type="submit"]:hover { background-color: #c82333; }
        a { color: #0066cc; text-decoration: none; margin-left: 10px; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h2>Confirmar Exclusão</h2>
    
    <?php if (!empty($erro)): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 15px;">
            <?= $erro ?>
        </div>
    <?php endif; ?>
    
    <div class="confirmacao">
        <p>Você está prestes a excluir o seguinte produto:</p>
        
        <p style="font-size: 18px; font-weight: bold;">
            <?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>
        </p>
        
        <p><strong>ID:</strong> <?= (int) $produto['id'] ?></p>
        <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
        
        <p class="aviso">Esta ação não pode ser desfeita.</p>
        
        <form method="post">
            <p><strong>Para confirmar, digite o nome exato do produto:</strong></p>
            <input type="text" name="confirmacao" placeholder="<?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>" required autofocus>
            
            <div class="buttons">
                <input type="submit" value="Sim, excluir este produto">
                <a href="index.php">Cancelar</a>
            </div>
        </form>
        
        <hr>
        <p style="font-size: 12px; color: #666;">
            <strong>Dica:</strong> Digite o nome do produto para confirmar a exclusão.
        </p>
    </div>
</body>
</html>
