<?php
declare(strict_types=1);
require_once __DIR__ . '/../funcoes.php';

$tituloPagina = 'Buscar Notícias';
$todasNoticias = obterTodasNoticias();

$categoria = isset($_GET['categoria']) ? trim((string) $_GET['categoria']) : '';
$busca     = isset($_GET['busca'])     ? trim((string) $_GET['busca'])     : '';

$noticiasFiltradas = filtrarNoticias($todasNoticias, $categoria, $busca);
$categorias        = categoriasDisponiveis($todasNoticias);

include __DIR__ . '/../partials/cabecalho.php';
?>

<div class="section-title">Buscar Notícias</div>

<!-- Formulário de busca -->
<form method="get" class="row g-2 mb-4 align-items-end">
    <div class="col-md-4">
        <label class="form-label" for="categoria">Categoria</label>
        <select class="form-select" name="categoria" id="categoria">
            <option value="">Todas as categorias</option>
            <?php foreach ($categorias as $itemCategoria): ?>
                <option value="<?= esc($itemCategoria) ?>"
                    <?= $categoria === $itemCategoria ? 'selected' : '' ?>>
                    <?= esc($itemCategoria) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="busca">Palavra-chave</label>
        <input class="form-control" type="text" name="busca" id="busca"
               value="<?= esc($busca) ?>" maxlength="100"
               placeholder="Título, assunto...">
    </div>

    <div class="col-md-2 d-grid">
        <button class="btn btn-primary" type="submit">Buscar</button>
    </div>
</form>

<?php if ($categoria !== '' || $busca !== ''): ?>
    <p class="text-muted mb-3" style="font-family: system-ui, sans-serif; font-size: 0.85rem;">
        <?= count($noticiasFiltradas) ?> resultado(s) encontrado(s)
        <?php if ($categoria !== ''): ?>
            em <strong><?= esc($categoria) ?></strong>
        <?php endif; ?>
        <?php if ($busca !== ''): ?>
            para "<strong><?= esc($busca) ?></strong>"
        <?php endif; ?>
        — <a href="filtrar.php" style="color: #c0392b;">Limpar filtro</a>
    </p>
<?php endif; ?>

<hr class="mb-4">

<!-- Resultados -->
<?php if (empty($noticiasFiltradas)): ?>
    <p class="text-muted" style="font-family: system-ui, sans-serif;">
        Nenhuma notícia encontrada. Tente outros termos.
    </p>
<?php else: ?>
    <div class="row g-3">
        <?php foreach ($noticiasFiltradas as $noticia): ?>
            <div class="col-12">
                <article class="row g-0 border-bottom pb-3">
                    <div class="col-md-3 col-sm-4">
                        <a href="detalhes.php?id=<?= (int) $noticia['id'] ?>">
                            <img src="<?= esc($noticia['imagem']) ?>"
                                 alt="<?= esc($noticia['titulo']) ?>"
                                 style="width: 100%; height: 140px; object-fit: cover; display: block;">
                        </a>
                    </div>
                    <div class="col-md-9 col-sm-8 ps-3">
                        <a href="filtrar.php?categoria=<?= urlencode($noticia['categoria']) ?>"
                           class="cat-badge mb-2 d-inline-block">
                            <?= esc($noticia['categoria']) ?>
                        </a>
                        <h3 style="font-size: 1.05rem; line-height: 1.35; margin: 0.25rem 0;">
                            <a href="detalhes.php?id=<?= (int) $noticia['id'] ?>"
                               class="text-decoration-none text-dark">
                                <?= esc($noticia['titulo']) ?>
                            </a>
                        </h3>
                        <p class="news-meta mb-1"><?= esc($noticia['data']) ?> — <?= esc($noticia['autor']) ?></p>
                        <p style="font-family: system-ui, sans-serif; font-size: 0.85rem; color: #555; margin: 0; line-height: 1.5;">
                            <?= esc($noticia['resumo']) ?>
                        </p>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/../partials/rodape.php'; ?>
