<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['produto'])) {
    $produto = $_POST['produto'];
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
    $_SESSION['carrinho'][] = $produto;
}
?>
<h1>Produtos</h1>
<ul>
    <li>Produto 1
        <form method="post">
            <input type="hidden" name="produto" value="Produto 1">
            <button type="submit">Adicionar ao carrinho</button>
        </form>
    </li>
    <li>Produto 2
        <form method="post">
            <input type="hidden" name="produto" value="Produto 2">
            <button type="submit">Adicionar ao carrinho</button>
        </form>
    </li>
    <li>Produto 3
        <form method="post">
            <input type="hidden" name="produto" value="Produto 3">
            <button type="submit">Adicionar ao carrinho</button>
        </form>
    </li>
</ul>
<a href="carrinho.php">Ver Carrinho</a>