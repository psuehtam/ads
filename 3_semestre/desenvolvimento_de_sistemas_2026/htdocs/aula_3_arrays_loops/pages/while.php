<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    // Inicializa o contador
    $contador = 1;
    // Executa enquanto o contador for <= 5
    while ($contador <= 5) {
        echo "<p>While - Contador: $contador</p>";
        $contador++; // Incrementa a cada iteração
    }
    ?>
</body>
    
</html>