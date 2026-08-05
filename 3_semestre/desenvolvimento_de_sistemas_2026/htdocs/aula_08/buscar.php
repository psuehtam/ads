<?php
require_once 'config.php';
require_once 'funcoes.php';

$termo = trim($_GET['busca'] ?? '');
$produtos = $termo !== '' ? buscarPorNome($pdo, $termo) : [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Buscar Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 8px; width: 300px; }
        input[type="submit"] { padding: 8px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        ul { max-width: 600px; }
        li { margin-bottom: 15px; padding: 10px; background-color: #f9f9f9; border-left: 4px solid #4CAF50; }
        .resultado-info { margin: 20px 0; font-weight: bold; }
        a { color: #0066cc; text-decoration: none; margin-top: 20px; display: inline-block; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h2>Buscar Produtos</h2>
    
    <form method="get">
        <input type="text" name="busca" placeholder="Digite parte do nome do produto..." 
               value="<?= htmlspecialchars($termo, ENT_QUOTES, 'UTF-8') ?>" autofocus>
        <input type="submit" value="Buscar">
    </form>
    
    <?php if ($termo !== ''): ?>
        <div class="resultado-info">
            Resultados para "<strong><?= htmlspecialchars($termo, ENT_QUOTES, 'UTF-8') ?></strong>": 
            <?= count($produtos) ?> encontrado(s).
        </div>
        
        <?php if (!empty($produtos)): ?>
            <ul>
                <?php foreach ($produtos as $p): ?>
                <li>
                    <strong><?= htmlspecialchars($p['nome'], ENT_QUOTES, 'UTF-8') ?></strong><br>
                    Preço: R$ <?= number_format($p['preco'], 2, ',', '.') ?> | 
                    Em estoque: <?= (int) $p['quantidade'] ?> unidade(s)<br>
                    <a href="detalhes.php?id=<?= (int) $p['id'] ?>" style="margin-top: 5px; display: inline;">Ver detalhes</a>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p><em>Nenhum produto encontrado com esse termo.</em></p>
        <?php endif; ?>
    <?php endif; ?>
    
    <br>
    <a href="index.php">Voltar à lista completa</a>
</body>
</html>
