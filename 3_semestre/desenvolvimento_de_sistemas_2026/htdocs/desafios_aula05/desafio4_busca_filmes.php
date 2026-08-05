<?php
$filmes = [
    'Matrix',
    'O Poderoso Chefao',
    'Interestelar',
    'Clube da Luta',
    'Forrest Gump',
    'A Origem',
    'O Senhor dos Aneis: A Sociedade do Anel',
    'Star Wars: Uma Nova Esperanca',
    'Gladiador',
    'Pulp Fiction',
    'Batman: O Cavaleiro das Trevas',
    'Guerra nas Estrelas',
    'O Silencio dos Inocentes',
];

$busca     = trim($_GET['busca'] ?? '');
$busca_esc = htmlspecialchars($busca, ENT_QUOTES, 'UTF-8');

if ($busca !== '') {
    $encontrados = array_filter($filmes, fn($f) => stripos($f, $busca) !== false);
} else {
    $encontrados = $filmes;
}

$total = count($encontrados);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio 4 - Busca de Filmes</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 2rem; background: #1a1a2e; color: #eee; }
    main { max-width: 680px; margin: 0 auto; background: #16213e; border: 1px solid #0f3460; border-radius: 12px; padding: 1.5rem; }
    h1 { color: #e94560; margin-top: 0; }
    .form-busca { display: flex; gap: 0.6rem; margin-top: 1rem; }
    .form-busca input {
      flex: 1; padding: 0.7rem; border: 1px solid #0f3460;
      border-radius: 8px; background: #0f3460; color: #eee; font-size: 1rem;
    }
    .form-busca input::placeholder { color: #aaa; }
    .form-busca button {
      padding: 0.7rem 1.2rem; background: #e94560; color: #fff;
      border: none; border-radius: 8px; cursor: pointer; font-size: 1rem;
    }
    .form-busca button:hover { background: #c0392b; }
    .info-resultado {
      margin-top: 1.2rem; font-size: 0.9rem; color: #aaa;
    }
    .info-resultado strong { color: #e94560; }
    ul.lista-filmes { list-style: none; padding: 0; margin-top: 0.8rem; }
    ul.lista-filmes li {
      padding: 0.7rem 1rem; background: #0f3460;
      border-radius: 8px; margin-bottom: 0.5rem;
      display: flex; align-items: center; gap: 0.6rem;
    }
    ul.lista-filmes li::before { content: '🎬'; font-size: 1.1rem; }
    .destaque { background: #e94560; color: #fff; padding: 0 3px; border-radius: 3px; }
    .nenhum { color: #aaa; margin-top: 1rem; font-style: italic; }
    .url-info { margin-top: 1rem; font-size: 0.82rem; color: #666; }
  </style>
</head>
<body>
  <main>
    <h1>Busca de Filmes</h1>
    <p>Desafio 4 &mdash; Filtro com <strong>GET</strong> e <code>stripos()</code>. A busca pode ser compartilhada por link!</p>

    <form method="get" class="form-busca">
      <input id="busca" type="text" name="busca"
             placeholder="Digite o titulo ou parte dele..."
             value="<?= $busca_esc ?>">
      <button type="submit">Buscar</button>
    </form>

    <div class="info-resultado">
      <?php if ($busca !== ''): ?>
        Resultados para <strong>&quot;<?= $busca_esc ?>&quot;</strong>:
        <strong><?= $total ?></strong> <?= $total === 1 ? 'filme encontrado' : 'filmes encontrados' ?>
      <?php else: ?>
        Exibindo todos os filmes: <strong><?= $total ?></strong> no total
      <?php endif; ?>
    </div>

    <?php if ($total > 0): ?>
      <ul class="lista-filmes">
        <?php foreach ($encontrados as $filme):
            $filme_esc = htmlspecialchars($filme, ENT_QUOTES, 'UTF-8');
            // destaca o trecho buscado no titulo
            if ($busca !== '') {
                $filme_esc = preg_replace(
                    '/(' . preg_quote($busca_esc, '/') . ')/i',
                    '<span class="destaque">$1</span>',
                    $filme_esc
                );
            }
        ?>
          <li><?= $filme_esc ?></li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="nenhum">Nenhum filme encontrado para &quot;<?= $busca_esc ?>&quot;. Tente outro termo.</p>
    <?php endif; ?>

    <?php if ($busca !== ''): ?>
      <p class="url-info">URL gerada: <code>?<?= htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES, 'UTF-8') ?></code></p>
    <?php endif; ?>
  </main>
</body>
</html>
