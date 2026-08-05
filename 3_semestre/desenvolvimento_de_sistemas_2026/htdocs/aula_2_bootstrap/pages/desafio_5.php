<?php
$base_url = "../";
$isRegistered = true;
$isPasswordCorrect = false;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/desafios.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">

</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; 
    
    echo "Usuário cadastrado: " . ($isRegistered ? "Sim" : "Não") . "<br>";
    echo "Senha correta: : " . ($isPasswordCorrect ? "Sim" : "Não") . "<br>";

    if ($isRegistered && $isPasswordCorrect) {
        echo "Acesso permitido!";
    } else {
        echo "Acesso negado!";
    }
    ?>


</body>
</html>