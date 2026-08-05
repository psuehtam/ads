<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array c Vetor</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    // Vetor: array de 1 dimensão
    $sucos = [
        "Suco de Banana",
        "Suco de Melancia",
        "Suco de Maracuja",
        "Suco de Limão",
        "Suco de Caju"
    ];
    // Acessando pelo índice
    echo $sucos[0]; // banana
    echo $sucos[3]; // Limão

    // Percorrendo com foreach
    foreach ($sucos as $sucos) {
        echo "<p>Sucos: $sucos</p>";
    }
    ?>
</body>

</html>