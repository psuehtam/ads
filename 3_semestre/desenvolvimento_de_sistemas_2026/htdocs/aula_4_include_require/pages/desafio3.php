<?php
$base_url = "../";
require_once $base_url . 'includes/funcoes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Carrinho de Compras</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <?php include $base_url . 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Simulador de Carrinho de Compras</h1>

        <form method="GET" action="" class="mb-4">
            <div class="mb-3">
                <label for="produto" class="form-label">Produto:</label>
                <input type="text" class="form-control" id="produto" name="produto" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço (R$):</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
        if (isset($_GET['produto']) && isset($_GET['preco']) && isset($_GET['quantidade'])) {
            $produto = htmlspecialchars($_GET['produto']);
            $preco = (float) $_GET['preco'];
            $quantidade = (int) $_GET['quantidade'];

            if ($preco > 0 && $quantidade > 0) {
                $subtotal = calcularSubtotal($preco, $quantidade);
                $descontoPercentual = 5; // Fixo em 5% conforme exemplo
                $desconto = aplicarDesconto($subtotal, $descontoPercentual);
                $frete = calcularFrete($subtotal);
                $total = $subtotal - $desconto + $frete;

                echo '<div class="card">';
                echo '<div class="card-header">Resumo do Pedido</div>';
                echo '<div class="card-body">';
                echo '<p><strong>Produto:</strong> ' . $produto . '</p>';
                echo '<p><strong>Quantidade:</strong> ' . $quantidade . '</p>';
                echo '<p><strong>Subtotal:</strong> R$ ' . number_format($subtotal, 2, ',', '.') . '</p>';
                echo '<p><strong>Desconto (' . $descontoPercentual . '%):</strong> -R$ ' . number_format($desconto, 2, ',', '.') . '</p>';
                echo '<p><strong>Frete:</strong> ' . ($frete == 0 ? 'Grátis' : 'R$ ' . number_format($frete, 2, ',', '.')) . '</p>';
                echo '<p><strong>Total:</strong> R$ ' . number_format($total, 2, ',', '.') . '</p>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger">Por favor, insira valores válidos para preço e quantidade (maiores que zero).</div>';
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>