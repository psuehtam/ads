<?php
require_once 'config.php';
require_once 'funcoes.php';

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $preco = str_replace(',', '.', trim($_POST['preco'] ?? ''));
    $quantidade = trim($_POST['quantidade'] ?? '');
    
    if (!validarCampos($nome, $preco, $quantidade)) {
        $mensagem = "<p style='color:red;'>Preencha todos os campos corretamente.</p>";
    } else {
        $ok = inserirProduto($pdo, $nome, (float) $preco, (int) $quantidade);
        if ($ok) {
            $mensagem = "<p style='color:green;'>Produto cadastrado com sucesso!</p>";
        } else {
            $mensagem = "<p style='color:red;'>Erro ao cadastrar produto.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin-bottom: 15px; }
        input[type="submit"] { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        a { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Cadastro de Produto</h2>
    
    <?= $mensagem ?>
    
    <form method="post">
        <label>Produto:</label><br>
        <input type="text" name="nome" required><br>
        
        <label>Preço (R$):</label><br>
        <input type="text" name="preco" placeholder="Ex: 100,00" required><br>
        
        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" min="0" required><br>
        
        <input type="submit" value="Cadastrar">
    </form>
    
    <br>
    <a href="index.php">Ver todos os produtos</a> | 
    <a href="buscar.php">Buscar por nome</a>
</body>
</html>
