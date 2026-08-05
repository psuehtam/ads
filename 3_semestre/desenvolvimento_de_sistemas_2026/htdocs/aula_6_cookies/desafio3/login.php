<?php
session_start();
$mensagem = '';
$usuario_prefill = isset($_COOKIE['lembrar_usuario']) ? $_COOKIE['lembrar_usuario'] : '';

if (isset($_SESSION['usuario_logado'])) {
    header('Location: painel.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);
    $lembrar = isset($_POST['lembrar']);

    if (isset($_SESSION['usuarios'])) {
        $login_sucesso = false;
        foreach ($_SESSION['usuarios'] as $user) {
            if ($user['usuario'] == $usuario && $user['senha'] == $senha) {
                $login_sucesso = true;
                break;
            }
        }
        if ($login_sucesso) {
            $_SESSION['usuario_logado'] = $usuario;
            if ($lembrar) {
                setcookie('lembrar_usuario', $usuario, time() + (30 * 24 * 60 * 60)); // 30 days
            }
            header('Location: painel.php');
            exit;
        } else {
            $mensagem = 'Usuário ou senha incorretos.';
        }
    } else {
        $mensagem = 'Nenhum usuário registrado.';
    }
}
?>
<h1>Login</h1>
<?php if ($mensagem) echo "<p>$mensagem</p>"; ?>
<form method="post">
    <label>Usuário: <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario_prefill); ?>" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <label><input type="checkbox" name="lembrar"> Lembrar de mim</label><br>
    <button type="submit">Entrar</button>
</form>
<a href="registro.php">Registrar</a>