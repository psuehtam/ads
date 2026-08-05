<?php
session_start();
if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit;
}
$usuario = $_SESSION['usuario_logado'];
?>
<h1>Painel</h1>
<p>Bem-vindo, <?php echo htmlspecialchars($usuario); ?>!</p>
<a href="logout.php">Sair</a>