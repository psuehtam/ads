<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    // Definição do array de alunos
    $alunos = [
        "Ana",
        "Carlos",
        "Beatriz",
        "Daniel",
        "Fernanda",
        "Gustavo"
    ];
    
    echo "<h2>Lista de Presença</h2>";
    srand(7);//posso colocar uma semente, que nem no mine, coloco oq eu quero, toda vez vai ser esse mesmo resultadp
    foreach ($alunos as $aluno) {
        $presenca = rand(0, 1)
            ? "Presente" : "Ausente";
        $cor = ($presenca == "Presente")
            ? "green" : "red";
        echo "<p style='color: $cor;'>
<strong>$aluno:</strong>
$presenca</p>";
    }
    ?>
</body>

</html>