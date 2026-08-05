<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/dados.php';

function esc(string $valor): string
{
    return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
}

function obterTodasNoticias(): array
{
    global $NOTICIAS_INICIAIS;

    $extras = $_SESSION['noticias_adicionadas'] ?? [];

    return array_merge($NOTICIAS_INICIAIS, $extras);
}

function buscarNoticiaPorId(int $id): ?array
{
    $noticias = obterTodasNoticias();

    foreach ($noticias as $noticia) {
        if ((int) $noticia['id'] === $id) {
            return $noticia;
        }
    }

    return null;
}

function filtrarNoticias(array $noticias, string $categoria = '', string $busca = ''): array
{
    $resultado = [];
    $categoria = mb_strtolower(trim($categoria));
    $busca = mb_strtolower(trim($busca));

    foreach ($noticias as $noticia) {
        $categoriaNoticia = mb_strtolower($noticia['categoria']);
        $tituloNoticia = mb_strtolower($noticia['titulo']);
        $resumoNoticia = mb_strtolower($noticia['resumo']);

        $okCategoria = ($categoria === '' || $categoriaNoticia === $categoria);
        $okBusca = (
            $busca === '' ||
            str_contains($tituloNoticia, $busca) ||
            str_contains($resumoNoticia, $busca)
        );

        if ($okCategoria && $okBusca) {
            $resultado[] = $noticia;
        }
    }

    return $resultado;
}

function categoriasDisponiveis(array $noticias): array
{
    $categorias = [];

    foreach ($noticias as $noticia) {
        $categorias[] = $noticia['categoria'];
    }

    $categorias = array_values(array_unique($categorias));
    sort($categorias);

    return $categorias;
}

function validarLogin(string $usuario, string $senha): bool
{
    global $CREDENCIAIS_FIXAS;

    if ($usuario !== $CREDENCIAIS_FIXAS['usuario']) {
        return false;
    }

    return password_verify($senha, $CREDENCIAIS_FIXAS['senha_hash']);
}

function usuarioEstaLogado(): bool
{
    return isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] !== '';
}

function exigirLogin(): void
{
    if (!usuarioEstaLogado()) {
        header('Location: login.php');
        exit;
    }
}

function adicionarNoticiaSessao(array $novaNoticia): void
{
    $noticias = obterTodasNoticias();
    $ids = array_column($noticias, 'id');
    $proximoId = empty($ids) ? 1 : (max($ids) + 1);

    $novaNoticia['id'] = $proximoId;

    if (!isset($_SESSION['noticias_adicionadas'])) {
        $_SESSION['noticias_adicionadas'] = [];
    }

    $_SESSION['noticias_adicionadas'][] = $novaNoticia;
}
