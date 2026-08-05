<?php
$base_url = "../";
require_once $base_url . 'includes/funcoes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação + Cálculo de Salário</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <?php include $base_url . 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Autenticação + Cálculo de Salário</h1>

        <?php
        $autenticado = false;
        if (isset($_GET['usuario']) && isset($_GET['senha'])) {
            $usuario = htmlspecialchars($_GET['usuario']);
            $senha = htmlspecialchars($_GET['senha']);
            $autenticado = autenticar($usuario, $senha);
        }

        if (!$autenticado) {
            // Formulário de login
            echo '<form method="GET" action="">';
            echo '<div class="mb-3">';
            echo '<label for="usuario" class="form-label">Usuário:</label>';
            echo '<input type="text" class="form-control" id="usuario" name="usuario" required>';
            echo '</div>';
            echo '<div class="mb-3">';
            echo '<label for="senha" class="form-label">Senha:</label>';
            echo '<input type="password" class="form-control" id="senha" name="senha" required>';
            echo '</div>';
            echo '<button type="submit" class="btn btn-primary">Login</button>';
            echo '</form>';
            if (isset($_GET['usuario'])) {
                echo '<div class="alert alert-danger mt-3">Usuário ou senha incorretos.</div>';
            }
        } else {
            // Formulário de salário
            echo '<form method="GET" action="">';
            echo '<input type="hidden" name="usuario" value="' . $usuario . '">';
            echo '<input type="hidden" name="senha" value="' . $senha . '">';
            echo '<div class="mb-3">';
            echo '<label for="salario" class="form-label">Salário Bruto (R$):</label>';
            echo '<input type="number" step="0.01" class="form-control" id="salario" name="salario" required>';
            echo '</div>';
            echo '<button type="submit" class="btn btn-primary">Calcular Salário</button>';
            echo '</form>';

            if (isset($_GET['salario'])) {
                $salario = (float) $_GET['salario'];
                if ($salario > 0) {
                    $bonus = calcularBonus($salario);
                    $inss = calcularINSS($salario);
                    $liquido = calcularSalarioLiquido($salario);

                    echo '<div class="card mt-4">';
                    echo '<div class="card-header">Cálculo Salarial</div>';
                    echo '<div class="card-body">';
                    echo '<p><strong>Salário bruto:</strong> R$ ' . number_format($salario, 2, ',', '.') . '</p>';
                    echo '<p><strong>Bônus (10%):</strong> R$ ' . number_format($bonus, 2, ',', '.') . '</p>';
                    echo '<p><strong>Desconto INSS (11%):</strong> R$ ' . number_format($inss, 2, ',', '.') . '</p>';
                    echo '<p><strong>Salário líquido:</strong> R$ ' . number_format($liquido, 2, ',', '.') . '</p>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-danger mt-4">Por favor, insira um salário válido (maior que zero).</div>';
                }
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
