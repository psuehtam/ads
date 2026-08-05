<?php
$base_url = "../";
$grade = [8.5, 7.4, 9.9, 8.6, 7.9];
$gradeSum = array_sum($grade);
$gradeCount = count($grade);
$average = $gradeSum / $gradeCount;
$status
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/desafios.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">

</head>

<body>
    
    <?php include $base_url . 'includes/navbar.php';

    if ($average>= 7){
        $status = "Aprovado";}
        else 
            {$status = "Reprovado";}
    echo "Média: " . number_format($average, 2) .  " | " . $status;
    ?>

</body>
</html>