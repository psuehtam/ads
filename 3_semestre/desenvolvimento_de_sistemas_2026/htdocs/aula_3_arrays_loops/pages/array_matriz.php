<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array c Matriz</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    // Matriz: array de 2 dimensões (produtos)
    $produtos = [
        ["nome" => "Celular", "preco" => 1200],
        ["nome" => "Notebook", "preco" => 3500],
        ["nome" => "Tablet", "preco" => 900]
    ];
    // Acessando um valor específico
    echo $produtos[0]["nome"]; // Celular
    echo $produtos[1]["preco"]; // 3500
    // Percorrendo a matriz
    foreach ($produtos as $produto) {
        echo "<p>{$produto['nome']}: R$ {$produto['preco']}</p>";
    }
    ?>
</body>

</html>