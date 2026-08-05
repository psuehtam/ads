<?php
declare(strict_types=1);
require_once __DIR__ . '/../funcoes.php';

$tituloPagina = 'Notícia';
$mensagemErro = '';
$noticia = null;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $mensagemErro = 'ID inválido.';
} else {
    $id = (int) $_GET['id'];
    $noticia = buscarNoticiaPorId($id);

    if ($noticia === null) {
        $mensagemErro = 'Notícia não encontrada.';
    } else {
        $tituloPagina = $noticia['titulo'];
    }
}

include __DIR__ . '/../partials/cabecalho.php';
?>

<?php if ($mensagemErro !== ''): ?>
    <div class="alert alert-danger"><?= esc($mensagemErro) ?></div>
    <a class="btn btn-outline-secondary" href="index.php">Voltar</a>
<?php else: ?>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Início</a></li>
            <li class="breadcrumb-item">
                <a href="filtrar.php?categoria=<?= urlencode($noticia['categoria']) ?>">
                    <?= esc($noticia['categoria']) ?>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Notícia</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Categoria + Título -->
            <a href="filtrar.php?categoria=<?= urlencode($noticia['categoria']) ?>"
               class="cat-badge mb-3 d-inline-block">
                <?= esc($noticia['categoria']) ?>
            </a>

            <h1 style="font-size: 2rem; line-height: 1.2; margin-bottom: 1rem;">
                <?= esc($noticia['titulo']) ?>
            </h1>

            <!-- Meta -->
            <p class="news-meta mb-3 pb-3 border-bottom">
                <?= esc($noticia['data']) ?> — por <?= esc($noticia['autor']) ?>
            </p>

            <!-- Imagem principal -->
            <img src="<?= esc($noticia['imagem']) ?>"
                 alt="<?= esc($noticia['titulo']) ?>"
                 class="mb-4"
                 style="width: 100%; height: 400px; object-fit: cover; display: block;">

            <!-- Resumo em destaque -->
            <p style="font-family: system-ui, sans-serif; font-size: 1.1rem; font-weight: 500; color: #333; line-height: 1.7; border-left: 3px solid #c0392b; padding-left: 1rem; margin-bottom: 1.5rem;">
                <?= esc($noticia['resumo']) ?>
            </p>

            <!-- Corpo da notícia -->
            <div style="font-size: 1.05rem; line-height: 1.9; color: #222;">
                <?= nl2br(esc($noticia['conteudo'])) ?>
            </div>

            <hr class="mt-5">

            <a class="btn btn-outline-secondary btn-sm" href="index.php">&larr; Voltar às notícias</a>

        </div>
    </div>

<?php endif; ?>

<?php include __DIR__ . '/../partials/rodape.php'; ?>
