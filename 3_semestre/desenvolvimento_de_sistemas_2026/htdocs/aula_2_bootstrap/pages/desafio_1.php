<?php
$base_url = "../";
$name = "João Silva";
$age = "25 anos";
$city = "São Paulo";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/desafios.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
    
    
</head>
<body>
     <?php include $base_url . 'includes/navbar.php'; ?>

    <div class="card shadow-sm" style="margin-top: 20px;">
        <div class="card-body">
            <h5 class="card-tittle">Informações do usuário em php</h5>
            <?php
            echo "<p><strong>Nome:</strong> $name</p>";
            echo "<p><strong>Idade:</strong> $age</p>";
            echo "<p><strong>Cidade:</strong> $city</p>";
            ?>
        </div>
    </div>



</body>
</html>