<?php
declare(strict_types=1);
require_once __DIR__ . '/../funcoes.php';

$tituloPagina = 'Início';
$noticias = array_reverse(obterTodasNoticias());

include __DIR__ . '/../partials/cabecalho.php';
?>

<?php if (empty($noticias)): ?>
    <p class="text-muted">Nenhuma notícia disponível.</p>
<?php else: ?>

    <?php
    $destaque = $noticias[0];
    $demais   = array_slice($noticias, 1);
    ?>

    <!-- Notícia em destaque -->
    <div class="row mb-4 gx-4">
        <div class="col-lg-8">
            <div class="section-title">Destaque</div>
            <a href="detalhes.php?id=<?= (int) $destaque['id'] ?>" class="text-decoration-none">
                <img src="<?= esc($destaque['imagem']) ?>"
                     alt="<?= esc($destaque['titulo']) ?>"
                     style="width:100%; height: 380px; object-fit: cover; display: block;">
            </a>
            <div class="pt-3 pb-2">
                <a href="filtrar.php?categoria=<?= urlencode($destaque['categoria']) ?>"
                   class="cat-badge mb-2 d-inline-block">
                    <?= esc($destaque['categoria']) ?>
                </a>
                <h2 class="mt-2" style="font-size: 1.65rem; line-height: 1.2;">
                    <a href="detalhes.php?id=<?= (int) $destaque['id'] ?>" class="text-decoration-none text-dark">
                        <?= esc($destaque['titulo']) ?>
                    </a>
                </h2>
                <p class="mt-2 mb-2" style="font-family: system-ui, sans-serif; font-size: 0.95rem; color: #444; line-height: 1.6;">
                    <?= esc($destaque['resumo']) ?>
                </p>
                <span class="news-meta"><?= esc($destaque['data']) ?> — <?= esc($destaque['autor']) ?></span>
            </div>
        </div>

        <!-- Coluna lateral -->
        <?php if (!empty($demais)): ?>
        <div class="col-lg-4 border-start">
            <div class="section-title">Últimas Notícias</div>
            <?php foreach (array_slice($demais, 0, 3) as $noticia): ?>
                <div class="mb-3 pb-3 border-bottom">
                    <a href="filtrar.php?categoria=<?= urlencode($noticia['categoria']) ?>"
                       class="cat-badge mb-1 d-inline-block">
                        <?= esc($noticia['categoria']) ?>
                    </a>
                    <h3 style="font-size: 0.95rem; line-height: 1.35; margin: 0.3rem 0 0.3rem;">
                        <a href="detalhes.php?id=<?= (int) $noticia['id'] ?>" class="text-decoration-none text-dark">
                            <?= esc($noticia['titulo']) ?>
                        </a>
                    </h3>
                    <span class="news-meta"><?= esc($noticia['data']) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Demais notícias em grid -->
    <?php if (count($demais) > 3): ?>
        <hr>
        <div class="section-title mt-4">Mais Notícias</div>
        <div class="row g-3">
            <?php foreach (array_slice($demais, 3) as $noticia): ?>
                <div class="col-sm-6 col-lg-4">
                    <article class="news-card h-100">
                        <a href="detalhes.php?id=<?= (int) $noticia['id'] ?>">
                            <img src="<?= esc($noticia['imagem']) ?>" alt="<?= esc($noticia['titulo']) ?>">
                        </a>
                        <div class="card-body">
                            <a href="filtrar.php?categoria=<?= urlencode($noticia['categoria']) ?>"
                               class="cat-badge mb-2 d-inline-block">
                                <?= esc($noticia['categoria']) ?>
                            </a>
                            <h3 class="card-title">
                                <a href="detalhes.php?id=<?= (int) $noticia['id'] ?>">
                                    <?= esc($noticia['titulo']) ?>
                                </a>
                            </h3>
                            <p class="news-meta mb-2"><?= esc($noticia['data']) ?> — <?= esc($noticia['autor']) ?></p>
                            <p style="font-family: system-ui, sans-serif; font-size: 0.85rem; color: #555; line-height: 1.5; margin: 0;">
                                <?= esc($noticia['resumo']) ?>
                            </p>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php include __DIR__ . '/../partials/rodape.php'; ?>
