<?php
echo "<h2>Diagnóstico da Conexão MySQL</h2>";
echo "<p>Testando portas do MySQL...</p>";

$portas = ['3306', '3307', '3308', '3309'];

foreach ($portas as $p) {
    try {
        new PDO(
            "mysql:host=localhost;port=$p",
            'root',
            ''
        );
        echo "<p style='color: green;'><strong>Porta $p: OK ✓</strong></p>";
        echo "<p>Use <strong>$p</strong> no config.php</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Porta $p: sem resposta</p>";
    }
}

echo "<hr>";
echo "<p><a href='index.php'>Voltar ao sistema</a></p>";
?>
