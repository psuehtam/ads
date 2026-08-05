<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$portas = ['3306', '3307', '3308'];
$resultados = [];

foreach ($portas as $porta) {
    try {
        new PDO(
            "mysql:host=$host;port=$porta",
            $usuario,
            $senha,
            [PDO::ATTR_TIMEOUT => 2]
        );

        $resultados[] = [
            'porta' => $porta,
            'ok' => true,
        ];
    } catch (PDOException $e) {
        $resultados[] = [
            'porta' => $porta,
            'ok' => false,
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Diagnostico</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Diagnostico do MySQL</h1>

        <div class="menu">
            <a href="index.php">Produtos</a>
            <a href="categorias.php">Categorias</a>
            <a href="fornecedores.php">Fornecedores</a>
        </div>

        <table>
            <tr>
                <th>Porta</th>
                <th>Status</th>
            </tr>
            <?php foreach ($resultados as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['porta'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= $item['ok'] ? 'OK' : 'Sem resposta' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
