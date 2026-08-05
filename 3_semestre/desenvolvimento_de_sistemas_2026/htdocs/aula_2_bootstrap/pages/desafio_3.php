<?php
$base_url = "../";
$originalPrice = 200.00;
$discountPercentage = 10;
$finalPrice = $originalPrice - ($originalPrice * $discountPercentage) / 100;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/desafios.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">

</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; 
    
    echo "Preço original: " . number_format($originalPrice, 2, ',', '.') ."<br>"; 
    echo "Desconto aplicado: " . (int)$discountPercentage . "%" ."<br>";
    echo "Preço final: " . number_format($finalPrice, 2, ',', '.')."<br>";
    
    ?>


</body>
</html>