<?php
session_start();
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);
    if (strlen($usuario) < 4 || strlen($senha) < 4) {
        $mensagem = 'Usuário e senha devem ter no mínimo 4 caracteres.';
    } else {
        if (!isset($_SESSION['usuarios'])) {
            $_SESSION['usuarios'] = [];
        }
        // Check if user already exists
        $exists = false;
        foreach ($_SESSION['usuarios'] as $user) {
            if ($user['usuario'] == $usuario) {
                $exists = true;
                break;
            }
        }
        if ($exists) {
            $mensagem = 'Usuário já existe.';
        } else {
            $_SESSION['usuarios'][] = ['usuario' => $usuario, 'senha' => $senha];
            $mensagem = 'Usuário registrado com sucesso.';
        }
    }
}
?>
<h1>Registro</h1>
<?php if ($mensagem) echo "<p>$mensagem</p>"; ?>
<form method="post">
    <label>Usuário: <input type="text" name="usuario" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <button type="submit">Registrar</button>
</form>
<a href="login.php">Ir para Login</a>