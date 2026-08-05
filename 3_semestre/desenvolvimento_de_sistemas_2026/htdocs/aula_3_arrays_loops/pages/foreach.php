<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    // Criando um array de nomes
    $nomes = [
        "Ana",
        "Pedro",
        "Mariana",
        "José",
        "Carla"
    ];
    // Percorre o array e exibe índices e valores
    foreach ($nomes as $indice => $nome) {
        echo "<p>Índice: $indice - Nome: $nome</p>";
    }
    ?>
</body>

</html>