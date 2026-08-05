<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    // Estrutura do for:
    // inicialização; condição; incremento
    for ($i = 1; $i <= 5; $i++) {
        echo "<p>For - Contador: $i</p>";
    }
    ?>
</body>

</html>