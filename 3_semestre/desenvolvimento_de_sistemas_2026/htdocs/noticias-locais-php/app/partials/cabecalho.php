<?php
if (!isset($tituloPagina)) {
    $tituloPagina = 'Noticias Locais';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($tituloPagina) ?> — Notícias Locais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ── Tipografia ── */
        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            background: #fff;
            color: #111;
            font-size: 16px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Georgia', 'Times New Roman', serif;
            font-weight: 700;
            color: #111;
            line-height: 1.25;
        }

        p, label, input, select, textarea, small, .form-text {
            font-family: system-ui, -apple-system, sans-serif;
        }

        /* ── Topo do site ── */
        .site-header {
            border-bottom: 3px solid #c0392b;
            padding: 0.75rem 0 0;
            background: #fff;
        }

        .site-title {
            font-size: 2rem;
            font-weight: 900;
            color: #111;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .site-title:hover { color: #c0392b; }

        .site-tagline {
            font-family: system-ui, sans-serif;
            font-size: 0.8rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ── Navegação ── */
        .main-nav {
            background: #111;
        }

        .main-nav .nav-link {
            font-family: system-ui, sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            color: #ccc;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.65rem 1rem;
            border-radius: 0;
            transition: color 0.15s, background 0.15s;
        }

        .main-nav .nav-link:hover,
        .main-nav .nav-link:focus {
            color: #fff;
            background: #c0392b;
        }

        .main-nav .navbar-toggler {
            border-color: #555;
        }

        .main-nav .navbar-toggler-icon {
            filter: invert(1);
        }

        /* ── Badge de categoria ── */
        .cat-badge {
            display: inline-block;
            font-family: system-ui, sans-serif;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            background: #c0392b;
            color: #fff;
            padding: 0.2rem 0.6rem;
            border-radius: 2px;
            text-decoration: none;
        }

        /* ── Cards de notícia ── */
        .news-card {
            border: 1px solid #e5e5e5;
            border-radius: 0;
            transition: border-color 0.15s;
            background: #fff;
        }

        .news-card:hover {
            border-color: #bbb;
        }

        .news-card .card-body { padding: 1rem; }

        .news-card img {
            border-radius: 0;
            display: block;
            width: 100%;
            height: 210px;
            object-fit: cover;
        }

        .news-card .card-title {
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 0.4rem;
        }

        .news-card .card-title a {
            color: #111;
            text-decoration: none;
        }

        .news-card .card-title a:hover { color: #c0392b; }

        .news-meta {
            font-family: system-ui, sans-serif;
            font-size: 0.78rem;
            color: #888;
        }

        /* ── Botões ── */
        .btn-primary {
            background: #c0392b;
            border-color: #c0392b;
            border-radius: 2px;
            font-family: system-ui, sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
        }

        .btn-primary:hover, .btn-primary:focus {
            background: #a93226;
            border-color: #a93226;
        }

        .btn-outline-secondary {
            border-radius: 2px;
            font-family: system-ui, sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            color: #444;
            border-color: #bbb;
        }

        .btn-outline-secondary:hover {
            background: #f5f5f5;
            color: #111;
            border-color: #999;
        }

        /* ── Separadores de seção ── */
        .section-title {
            font-size: 0.75rem;
            font-family: system-ui, sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #c0392b;
            margin-bottom: 1rem;
            padding-bottom: 0.4rem;
            border-bottom: 2px solid #c0392b;
        }

        /* ── Formulários ── */
        .form-control, .form-select {
            border-radius: 2px;
            border: 1px solid #ccc;
            font-family: system-ui, sans-serif;
            font-size: 0.9rem;
            padding: 0.55rem 0.75rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #c0392b;
            box-shadow: 0 0 0 0.2rem rgba(192, 57, 43, 0.15);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #333;
            margin-bottom: 0.35rem;
        }

        /* ── Alertas ── */
        .alert {
            border-radius: 2px;
            font-family: system-ui, sans-serif;
            font-size: 0.9rem;
        }

        /* ── Linha divisória ── */
        hr { border-color: #e5e5e5; }

        /* ── Breadcrumb ── */
        .breadcrumb {
            font-family: system-ui, sans-serif;
            font-size: 0.8rem;
            background: none;
            padding: 0;
        }

        .breadcrumb-item a { color: #c0392b; text-decoration: none; }
        .breadcrumb-item a:hover { text-decoration: underline; }
        .breadcrumb-item.active { color: #777; }
        .breadcrumb-item + .breadcrumb-item::before { color: #bbb; }
    </style>
</head>
<body>

<!-- Topo do site -->
<header class="site-header mb-0">
    <div class="container py-2">
        <div class="d-flex justify-content-between align-items-end">
            <a class="site-title" href="index.php">Notícias Locais</a>
            <span class="site-tagline d-none d-md-inline">Sua cidade em dia</span>
        </div>
    </div>
</header>

<!-- Barra de navegação -->
<nav class="main-nav navbar navbar-expand-lg mb-4">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="filtrar.php">Buscar</a></li>
                <li class="nav-item"><a class="nav-link" href="protegido.php">Redação</a></li>
            </ul>
            <ul class="navbar-nav">
                <?php if (usuarioEstaLogado()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php">Sair</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="container mb-5">
