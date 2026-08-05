<?php
declare(strict_types=1);
require_once __DIR__ . '/../funcoes.php';

if (usuarioEstaLogado()) {
    header('Location: protegido.php');
    exit;
}

$tituloPagina = 'Login';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = isset($_POST['usuario']) ? trim((string) $_POST['usuario']) : '';
    $senha   = isset($_POST['senha'])   ? (string) $_POST['senha']         : '';

    if (empty($usuario) || empty($senha)) {
        $erro = 'Preencha usuário e senha.';
    } elseif (validarLogin($usuario, $senha)) {
        $_SESSION['usuario_logado'] = $usuario;
        header('Location: protegido.php');
        exit;
    } else {
        $erro = 'Usuário ou senha incorretos.';
    }
}

include __DIR__ . '/../partials/cabecalho.php';
?>

<div class="row justify-content-center">
    <div class="col-md-5 col-sm-7">

        <div class="section-title mb-4">Acesso à Redação</div>

        <?php if ($erro !== ''): ?>
            <div class="alert alert-danger py-2"><?= esc($erro) ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label" for="usuario">Usuário</label>
                <input class="form-control" type="text" id="usuario" name="usuario"
                       autocomplete="username" required>
            </div>

            <div class="mb-4">
                <label class="form-label" for="senha">Senha</label>
                <input class="form-control" type="password" id="senha" name="senha"
                       autocomplete="current-password" required>
            </div>

            <button class="btn btn-primary w-100" type="submit">Entrar</button>
        </form>

        <p class="text-muted mt-4 mb-0" style="font-family: system-ui, sans-serif; font-size: 0.8rem;">
            Credenciais de teste: <code>admin</code> / <code>123456</code>
        </p>

        <p class="mt-3" style="font-family: system-ui, sans-serif; font-size: 0.85rem;">
            <a href="index.php" style="color: #c0392b;">&larr; Voltar ao início</a>
        </p>

    </div>
</div>

<?php include __DIR__ . '/../partials/rodape.php'; ?>
