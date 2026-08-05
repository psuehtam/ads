<?php
session_start();
?>
<h1>Carrinho de Compras</h1>
<?php
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    echo "<ul>";
    foreach ($_SESSION['carrinho'] as $item) {
        echo "<li>" . htmlspecialchars($item) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Carrinho vazio.</p>";
}
?>
<a href="produtos.php">Voltar aos Produtos</a> | <a href="limpar.php">Limpar Carrinho</a>