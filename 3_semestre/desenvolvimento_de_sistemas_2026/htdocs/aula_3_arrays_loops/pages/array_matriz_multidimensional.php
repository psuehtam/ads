<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array c Matriz Multidimensional</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php include $base_url . 'includes/navbar.php'; ?>
    <?php
    // Matriz multidimensional: 3 dimensões
    $escola = [
        "Turma A" => [ // 1a dim: turmas
            [
                "nome" => "Ana", // 2a dim: alunos
                "notas" => [8.0, 7.5, 9.0]
            ], // 3a dim: notas
            [
                "nome" => "Carlos",
                "notas" => [6.0, 5.5, 7.0]
            ]
        ],
        "Turma B" => [
            [
                "nome" => "Maria",
                "notas" => [9.5, 10.0, 8.5]
            ],
            [
                "nome" => "João",
                "notas" => [4.0, 5.0, 6.0]
            ]
        ]
    ];
    foreach ($escola as $turma => $alunos) {
        echo "<h3>$turma</h3>";
        foreach ($alunos as $aluno) {
            $media = array_sum($aluno['notas'])
                / count($aluno['notas']);
            echo "<p>{$aluno['nome']}: média "
                . number_format($media, 1) . "</p>";
        }
    }
    ?>
</body>

</html>