<?php
declare(strict_types=1);
require_once __DIR__ . '/../funcoes.php';
exigirLogin();

$tituloPagina = 'Redação';
$erros = [];
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo   = isset($_POST['titulo'])   ? trim((string) $_POST['titulo'])   : '';
    $categoria = isset($_POST['categoria']) ? trim((string) $_POST['categoria']) : '';
    $imagem   = isset($_POST['imagem'])   ? trim((string) $_POST['imagem'])   : '';
    $resumo   = isset($_POST['resumo'])   ? trim((string) $_POST['resumo'])   : '';
    $conteudo = isset($_POST['conteudo']) ? trim((string) $_POST['conteudo']) : '';
    $autor    = isset($_POST['autor'])    ? trim((string) $_POST['autor'])    : '';

    if (empty($titulo))    $erros[] = 'Título é obrigatório.';
    if (empty($categoria)) $erros[] = 'Categoria é obrigatória.';
    if (empty($imagem) || filter_var($imagem, FILTER_VALIDATE_URL) === false)
                           $erros[] = 'Informe uma URL de imagem válida.';
    if (empty($resumo))    $erros[] = 'Resumo é obrigatório.';
    if (empty($conteudo))  $erros[] = 'Conteúdo é obrigatório.';
    if (empty($autor))     $erros[] = 'Autor é obrigatório.';

    if (empty($erros)) {
        adicionarNoticiaSessao([
            'titulo'   => $titulo,
            'categoria' => $categoria,
            'imagem'   => $imagem,
            'resumo'   => $resumo,
            'conteudo' => $conteudo,
            'data'     => date('d/m/Y'),
            'autor'    => $autor,
        ]);

        $sucesso = 'Notícia publicada com sucesso! Ela já aparece na página inicial.';
    }
}

include __DIR__ . '/../partials/cabecalho.php';
?>

<div class="d-flex justify-content-between align-items-baseline mb-1">
    <div class="section-title mb-0">Redação</div>
    <a href="sair.php" class="text-muted"
       style="font-family: system-ui, sans-serif; font-size: 0.8rem; text-decoration: none;">
        Sair (<?= esc((string) $_SESSION['usuario_logado']) ?>)
    </a>
</div>

<h1 class="mb-4" style="font-size: 1.6rem;">Nova Notícia</h1>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger py-2">
        <ul class="mb-0 ps-3">
            <?php foreach ($erros as $erro): ?>
                <li><?= esc($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($sucesso !== ''): ?>
    <div class="alert alert-success py-2"><?= esc($sucesso) ?></div>
<?php endif; ?>

<form method="post" class="row g-3">

    <div class="col-lg-8">
        <label class="form-label" for="titulo">Título</label>
        <input class="form-control" type="text" id="titulo" name="titulo" maxlength="120" required>
    </div>

    <div class="col-lg-4">
        <label class="form-label" for="categoria">Categoria</label>
        <input class="form-control" type="text" id="categoria" name="categoria" maxlength="50"
               placeholder="Ex: Cidade, Saúde..." required>
    </div>

    <div class="col-12">
        <label class="form-label" for="imagem">URL da imagem</label>
        <input class="form-control" type="url" id="imagem" name="imagem"
               placeholder="https://..." required>
    </div>

    <div class="col-12">
        <label class="form-label" for="resumo">Resumo <small class="text-muted fw-normal">(máx. 220 caracteres)</small></label>
        <textarea class="form-control" id="resumo" name="resumo" rows="2"
                  maxlength="220" required></textarea>
    </div>

    <div class="col-12">
        <label class="form-label" for="conteudo">Conteúdo</label>
        <textarea class="form-control" id="conteudo" name="conteudo" rows="6" required></textarea>
    </div>

    <div class="col-md-5">
        <label class="form-label" for="autor">Autor</label>
        <input class="form-control" type="text" id="autor" name="autor" maxlength="80" required>
    </div>

    <div class="col-12 d-flex gap-2 mt-1">
        <button class="btn btn-primary" type="submit">Publicar</button>
        <a class="btn btn-outline-secondary" href="index.php">Ver portal</a>
    </div>

</form>

<?php include __DIR__ . '/../partials/rodape.php'; ?>
