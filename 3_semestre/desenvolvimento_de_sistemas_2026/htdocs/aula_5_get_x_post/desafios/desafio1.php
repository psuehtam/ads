<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Simples (GET)</title>
</head>
<body>
    <h2>Calculadora Simples</h2>
    <form method="get">
        <label>Número 1:</label>
        <input type="number" name="num1" step="any" required><br><br>
        
        <label>Operação:</label>
        <select name="operacao">
            <option value="+">Adição (+)</option>
            <option value="-">Subtração (-)</option>
            <option value="*">Multiplicação (*)</option>
            <option value="/">Divisão (/)</option>
        </select><br><br>
        
        <label>Número 2:</label>
        <input type="number" name="num2" step="any" required><br><br>
        
        <input type="submit" value="Calcular">
    </form>

    <hr>

    <?php
    // Valida se os campos foram enviados via GET
    if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacao'])) {
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $operacao = $_GET['operacao'];

        // Valida se os valores informados são numéricos
        if (is_numeric($num1) && is_numeric($num2)) {
            echo "<h3>Resultado da Calculadora</h3>";
            
            // Processamento da operação utilizando switch
            switch ($operacao) {
                case '+': 
                    $resultado = $num1 + $num2; 
                    echo "<p>$num1 + $num2 = $resultado</p>";
                    break;
                case '-': 
                    $resultado = $num1 - $num2; 
                    echo "<p>$num1 - $num2 = $resultado</p>";
                    break;
                case '*': 
                    $resultado = $num1 * $num2; 
                    echo "<p>$num1 * $num2 = $resultado</p>";
                    break;
                case '/':
                    // Tratamento para evitar erro de divisão por zero
                    if ($num2 == 0) {
                        echo "<p style='color:red;'>Erro: Não é possível dividir por zero!</p>";
                    } else {
                        $resultado = $num1 / $num2;
                        echo "<p>$num1 / $num2 = $resultado</p>";
                    }
                    break;
                default:
                    echo "<p>Operação inválida.</p>";
            }
        } else {
            echo "<p style='color:red;'>Insira valores numéricos válidos.</p>";
        }
    }
    ?>
</body>
</html>