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