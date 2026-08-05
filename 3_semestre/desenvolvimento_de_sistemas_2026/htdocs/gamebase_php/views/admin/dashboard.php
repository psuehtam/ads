<?php
$totalJogos = $totalJogos ?? 0;
$totalUsuarios = $totalUsuarios ?? 0;
$totalAvaliacoes = $totalAvaliacoes ?? 0;
?>

<section class="mb-4">
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Painel administrativo</h1>
            <p class="text-muted mb-0">Gerencie o catálogo, categorias e acompanhe a atividade da plataforma.</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <article class="card h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Jogos cadastrados</p>
                    <h2 class="display-6 fw-bold"><?= (int) $totalJogos ?></h2>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="card h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Usuários registrados</p>
                    <h2 class="display-6 fw-bold"><?= (int) $totalUsuarios ?></h2>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="card h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Avaliações publicadas</p>
                    <h2 class="display-6 fw-bold"><?= (int) $totalAvaliacoes ?></h2>
                </div>
            </article>
        </div>
    </div>

    <section class="row g-4">
        <div class="col-md-6">
            <article class="card h-100">
                <div class="card-body">
                    <h2 class="h4 mb-3">Jogos</h2>
                    <p class="text-muted">Cadastre novos títulos, atualize informações e remova jogos do catálogo.</p>
                    <a class="btn btn-gold" href="<?= e(baseUrl('index.php?page=admin_jogos')) ?>">Gerenciar jogos</a>
                </div>
            </article>
        </div>
        <div class="col-md-6">
            <article class="card h-100">
                <div class="card-body">
                    <h2 class="h4 mb-3">Categorias</h2>
                    <p class="text-muted">Organize o catálogo por gênero e mantenha a navegação do site consistente.</p>
                    <a class="btn btn-gold" href="<?= e(baseUrl('index.php?page=admin_categorias')) ?>">Gerenciar categorias</a>
                </div>
            </article>
        </div>
    </section>
</section>
