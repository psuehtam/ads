<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <?php include $base_url . 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Calculadora de IMC</h1>
        <form method="GET" action="">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="peso" class="form-label">Peso (kg):</label>
                <input type="number" step="0.01" class="form-control" id="peso" name="peso" required>
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label">Altura (m):</label>
                <input type="number" step="0.01" class="form-control" id="altura" name="altura" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular IMC</button>
        </form>

        <?php
        if (isset($_GET['nome']) && isset($_GET['peso']) && isset($_GET['altura'])) {
            $nome = htmlspecialchars($_GET['nome']);
            $peso = (float) $_GET['peso'];
            $altura = (float) $_GET['altura'];

            if ($peso > 0 && $altura > 0) {
                $imc = calcularIMC($peso, $altura);
                $classificacao = classificarIMC($imc);

                echo '<div class="card mt-4">';
                echo '<div class="card-header">Resultado do IMC</div>';
                echo '<div class="card-body">';
                echo '<p><strong>Nome:</strong> ' . $nome . '</p>';
                echo '<p><strong>Peso:</strong> ' . number_format($peso, 2, ',', '.') . ' kg | <strong>Altura:</strong> ' . number_format($altura, 2, ',', '.') . ' m</p>';
                echo '<p><strong>IMC:</strong> ' . number_format($imc, 2, ',', '.') . '</p>';
                echo '<p><strong>Classificação:</strong> ' . $classificacao . '</p>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger mt-4">Por favor, insira valores válidos para peso e altura (maiores que zero).</div>';
            }
        }

        function calcularIMC(float $peso, float $altura): float {
            return $peso / ($altura * $altura);
        }

        function classificarIMC(float $imc): string {
            if ($imc < 18.5) {
                return 'Abaixo do peso';
            } elseif ($imc < 25) {
                return 'Peso normal';
            } elseif ($imc < 30) {
                return 'Sobrepeso';
            } elseif ($imc < 35) {
                return 'Obesidade grau 1';
            } elseif ($imc < 40) {
                return 'Obesidade grau 2';
            } else {
                return 'Obesidade grau 3';
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>