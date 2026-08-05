<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array c Vetor associativo</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    // Vetor associativo: 1 dimensão com chaves
    $pessoa = [
        "nome" => "João",
        "idade" => 25,
        "cidade" => "São Paulo"
    ];
    // Acessando pelos nomes das chaves
    echo "<p>Nome: {$pessoa['nome']}</p>";
    echo "<p>Idade: {$pessoa['idade']}</p>";
    echo "<p>Cidade: {$pessoa['cidade']}</p>";
    ?>
</body>

</html>