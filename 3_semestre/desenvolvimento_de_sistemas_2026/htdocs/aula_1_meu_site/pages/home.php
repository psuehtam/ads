<?php
$mensagem1 = "Olá Mundo!";
$mensagem2 = "Me chamo Matheus Pupia";
$mensagem3 = "Esse é meu primeiro site em PHP!";
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>
<body>
    <?php include $base_url . 'includes/navbar.php'; ?>

    <div class="container">
        <h1><?php echo $mensagem1; ?></h1>
        <h2><?php echo $mensagem2; ?></h2>
        <p class="badge"><?php echo $mensagem3; ?></p>
    </div>
</body>
</html>