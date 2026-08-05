<?php
$itens = [];
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produtos    = $_POST['produto'] ?? [];
    $quantidades = $_POST['quantidade'] ?? [];

    for ($i = 0; $i < count($produtos); $i++) {
        $produto    = trim($produtos[$i] ?? '');
        $quantidade = trim($quantidades[$i] ?? '');

        // ignora linhas onde o produto esta vazio
        if (empty($produto)) {
            continue;
        }

        if (filter_var($quantidade, FILTER_VALIDATE_INT) === false || (int) $quantidade <= 0) {
            $mensagem = '<p class="erro">Quantidade invalida para o produto &quot;'
                . htmlspecialchars($produto, ENT_QUOTES, 'UTF-8')
                . '&quot;. Use numeros inteiros positivos.</p>';
            $itens = [];
            break;
        }

        $itens[] = [
            'produto'    => htmlspecialchars(ucwords(strtolower($produto)), ENT_QUOTES, 'UTF-8'),
            'quantidade' => (int) $quantidade,
        ];
    }

    if (empty($itens) && $mensagem === '') {
        $mensagem = '<p class="aviso">Adicione pelo menos um produto na lista.</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio 3 - Lista de Compras</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 2rem; background: #f9fbe7; color: #222; }
    main { max-width: 700px; margin: 0 auto; background: #fff; border: 1px solid #ddd; border-radius: 12px; padding: 1.5rem; }
    h1 { color: #33691e; }
    .linha-item { display: flex; gap: 0.8rem; margin-top: 0.8rem; align-items: center; }
    .linha-item label { width: 90px; font-weight: bold; flex-shrink: 0; }
    .linha-item input { flex: 1; padding: 0.6rem; border: 1px solid #aaa; border-radius: 6px; box-sizing: border-box; }
    .linha-item .campo-qtd { width: 90px; flex: none; }
    .numero-item { font-weight: bold; color: #558b2f; width: 20px; }
    button {
      margin-top: 1.2rem; padding: 0.8rem 1.5rem;
      background: #558b2f; color: #fff; border: none;
      border-radius: 8px; cursor: pointer; font-size: 1rem;
    }
    button:hover { background: #33691e; }
    table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
    th { background: #558b2f; color: #fff; padding: 0.6rem 1rem; text-align: left; }
    td { padding: 0.6rem 1rem; border-bottom: 1px solid #ddd; }
    tr:nth-child(even) { background: #f1f8e9; }
    .erro  { color: #b00020; font-weight: bold; margin-top: 1rem; }
    .aviso { color: #e65100; font-weight: bold; margin-top: 1rem; }
    .saida { margin-top: 1.5rem; padding-top: 1rem; border-top: 2px solid #c5e1a5; }
    .cabecalho-linha { display: flex; gap: 0.8rem; margin-bottom: 0.3rem; padding-left: 30px; }
    .cabecalho-linha span { color: #555; font-size: 0.85rem; font-weight: bold; }
    .cab-produto { flex: 1; }
    .cab-qtd { width: 90px; }
  </style>
</head>
<body>
  <main>
    <h1>Lista de Compras</h1>
    <p>Desafio 3 &mdash; Arrays via POST com <code>name="produto[]"</code> e <code>name="quantidade[]"</code>.</p>

    <form method="post">
      <div class="cabecalho-linha">
        <span class="cab-produto">Produto</span>
        <span class="cab-qtd">Quantidade</span>
      </div>

      <?php for ($i = 0; $i < 5; $i++): ?>
        <div class="linha-item">
          <span class="numero-item"><?= $i + 1 ?>.</span>
          <input type="text" name="produto[]"
                 placeholder="Ex: Arroz"
                 value="<?= htmlspecialchars($_POST['produto'][$i] ?? '', ENT_QUOTES, 'UTF-8') ?>">
          <input type="number" name="quantidade[]" min="1" class="campo-qtd"
                 placeholder="Qtd"
                 value="<?= htmlspecialchars($_POST['quantidade'][$i] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>
      <?php endfor; ?>

      <button type="submit">Montar Lista</button>
    </form>

    <section class="saida">
      <?php if (!empty($itens)): ?>
        <h2>Sua Lista de Compras</h2>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Produto</th>
              <th>Quantidade</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($itens as $idx => $item): ?>
              <tr>
                <td><?= $idx + 1 ?></td>
                <td><?= $item['produto'] ?></td>
                <td><?= $item['quantidade'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <p style="margin-top:0.8rem; color:#558b2f;">
          Total: <strong><?= count($itens) ?></strong> produto(s) na lista.
        </p>
      <?php elseif ($mensagem !== ''): ?>
        <?= $mensagem ?>
      <?php else: ?>
        <p style="color:#555;">Adicione produtos acima e clique em &quot;Montar Lista&quot;.</p>
      <?php endif; ?>
    </section>
  </main>
</body>
</html>
