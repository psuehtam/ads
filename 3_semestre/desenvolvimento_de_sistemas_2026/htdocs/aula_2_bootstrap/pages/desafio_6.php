<?php
$base_url = "../";
$grade = ["8.0", "7.5", "9.0"];
$gradeSum = array_sum($grade);
$gradeCount = count($grade);
$average = $gradeSum / $gradeCount;
$rating = "";
switch (true) {
    case ($average >= 9.0):
        $rating = "Excelente";
        break;
    case ($average >= 7.0 && $average <= 8.9):
        $rating = "Bom";
        break;
    case ($average >= 5.0 && $average <= 6.9):
        $rating = "Regular";
        break;
    default:
        $rating = "Reprovado";
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 6</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/desafios.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>

    <?php include $base_url . 'includes/navbar.php'; ?>

    <?php
    echo "Notas: " . implode(", ", $grade) . " | Média: " . number_format($average, 2) . " | Classificação: " . $rating;
    ?>

</body>

</html>