<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 2</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    $par = [];
    $impar = [];
    $primo = [];
    for ($i = 1; $i <= 15; $i++) {
        if ($i % 2 == 0) {
            $par[] = $i;
        } else {
            $impar[] = $i;
        }
        $ehPrimo = false;
        if ($i > 1) {
            $ehPrimo = true;
            for ($j = 2; $j < $i; $j++) {
                if ($i % $j == 0) {
                    $ehPrimo = false;
                    break;
                }
            }
        }
        if ($ehPrimo) {
            $primo[] = $i;
        }
    }
    echo "Numeros pares: <br>";
    foreach ($par as $p) {
        echo $p . " ";
    }
    echo "<br><br>";
    echo "Numeros impares: <br>";
    foreach ($impar as $im) {
        echo $im . " ";
    }
    echo "<br><br>";
    echo "Numeros primos: <br>";
    foreach ($primo as $pr) {
        echo $pr . " ";
    }

        echo "<br><br>";
        
foreach ($primo as $numeroPrimo){
    $fatorial = 1;

    for($k = $numeroPrimo; $k > 1; $k--){
        $fatorial *=$k;
    }
    echo "{$numeroPrimo}! = {$fatorial} <br>";
}

    ?>
</body>

</html>