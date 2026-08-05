<?php
$resultado = '';
$erro = '';

if (isset($_GET['num1'], $_GET['num2'], $_GET['operacao'])) {
    $num1 = trim($_GET['num1'] ?? '');
    $num2 = trim($_GET['num2'] ?? '');
    $operacao = trim($_GET['operacao'] ?? '');

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $erro = 'Por favor, insira numeros validos nos dois campos.';
    } else {
        $num1 = (float) $num1;
        $num2 = (float) $num2;

        $simbolos = [
            '+' => '+',
            '-' => '-',
            '*' => 'x',
            '/' => '/',
        ];

        $simbolo = $simbolos[$operacao] ?? '?';

        switch ($operacao) {
            case '+':
                $resultado = $num1 + $num2;
                break;
            case '-':
                $resultado = $num1 - $num2;
                break;
            case '*':
                $resultado = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    $erro = 'Erro: Nao e possivel dividir por zero!';
                } else {
                    $resultado = $num1 / $num2;
                }
                break;
            default:
                $erro = 'Operacao invalida.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio 1 - Calculadora Simples (GET)</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 2rem; background: #f0f4ff; color: #222; }
    main { max-width: 600px; margin: 0 auto; background: #fff; border: 1px solid #ccc; border-radius: 12px; padding: 1.5rem; }
    h1 { color: #1a237e; }
    label { display: block; margin-top: 1rem; font-weight: bold; }
    input[type="number"], select {
      width: 100%; padding: 0.7rem; margin-top: 0.4rem;
      box-sizing: border-box; border: 1px solid #aaa; border-radius: 6px;
    }
    button {
      margin-top: 1.2rem; padding: 0.8rem 1.5rem;
      background: #1a237e; color: #fff; border: none;
      border-radius: 8px; cursor: pointer; font-size: 1rem;
    }
    button:hover { background: #283593; }
    .resultado {
      margin-top: 1.5rem; padding: 1rem 1.2rem;
      background: #e8f5e9; border: 1px solid #a5d6a7;
      border-radius: 8px; color: #1b5e20;
    }
    .resultado h2 { margin-top: 0; }
    .resultado p { font-size: 1.3rem; font-weight: bold; }
    .erro {
      margin-top: 1.5rem; padding: 1rem 1.2rem;
      background: #ffebee; border: 1px solid #ef9a9a;
      border-radius: 8px; color: #b71c1c; font-weight: bold;
    }
    .info { margin-top: 0.5rem; font-size: 0.85rem; color: #555; }
  </style>
</head>
<body>
  <main>
    <h1>Calculadora Simples</h1>
    <p>Desafio 1 &mdash; Formulario com metodo <strong>GET</strong>. Os dados ficam visiveis na URL!</p>

    <form method="get">
      <label for="num1">Numero 1</label>
      <input id="num1" type="number" name="num1" step="any"
             value="<?= htmlspecialchars($_GET['num1'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

      <label for="operacao">Operacao</label>
      <select id="operacao" name="operacao">
        <?php
        $ops = ['+' => 'Adicao (+)', '-' => 'Subtracao (-)', '*' => 'Multiplicacao (*)', '/' => 'Divisao (/)'];
        foreach ($ops as $val => $label):
            $sel = (isset($_GET['operacao']) && $_GET['operacao'] === $val) ? 'selected' : '';
        ?>
          <option value="<?= $val ?>" <?= $sel ?>><?= $label ?></option>
        <?php endforeach; ?>
      </select>

      <label for="num2">Numero 2</label>
      <input id="num2" type="number" name="num2" step="any"
             value="<?= htmlspecialchars($_GET['num2'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

      <button type="submit">Calcular</button>
    </form>

    <?php if ($erro !== ''): ?>
      <div class="erro"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></div>
    <?php elseif ($resultado !== ''): ?>
      <div class="resultado">
        <h2>Resultado da Calculadora</h2>
        <p>
          <?= htmlspecialchars((string) $num1, ENT_QUOTES, 'UTF-8') ?>
          <?= htmlspecialchars($simbolo, ENT_QUOTES, 'UTF-8') ?>
          <?= htmlspecialchars((string) $num2, ENT_QUOTES, 'UTF-8') ?>
          = <?= number_format($resultado, 2, ',', '.') ?>
        </p>
        <span class="info">URL gerada: <code><?= htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES, 'UTF-8') ?></code></span>
      </div>
    <?php else: ?>
      <p style="margin-top:1.2rem; color:#555;">Preencha os campos e clique em Calcular.</p>
    <?php endif; ?>
  </main>
</body>
</html>
