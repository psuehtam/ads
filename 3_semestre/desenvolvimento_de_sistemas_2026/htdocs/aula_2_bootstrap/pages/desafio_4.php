<?php
$base_url = "../";
$age = 25;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 4</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/desafios.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">

</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; 
    
    if ($age < 12){
        $category = "Criança";
    } elseif ($age >=12 && $age <=17){
        $category = "Adolescente";
    } elseif ($age >= 18 && $age <=59){
        $category = "Adulto";
    } else {
        $category = "Idoso";
    }

    echo "Idade: " . $age . " | " . $category;
    
    ?>


</body>
</html>