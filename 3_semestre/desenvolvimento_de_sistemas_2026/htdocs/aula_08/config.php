<?php
$host = 'localhost';
$porta = '3307';
$banco = 'loja';
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8",
        $usuario,
        $senha
    );
    
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    
    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    // Verifica se a tabela produtos existe e adiciona a coluna ativo, se necessário
    try {
        $stmt = $pdo->query("SHOW TABLES LIKE 'produtos'");
        if ($stmt && $stmt->rowCount() > 0) {
            $stmt = $pdo->query("SHOW COLUMNS FROM produtos LIKE 'ativo'");
            if ($stmt && $stmt->rowCount() === 0) {
                $pdo->exec("ALTER TABLE produtos ADD COLUMN ativo BOOLEAN DEFAULT TRUE");
            }
        }
    } catch (PDOException $e) {
        // Se a tabela não existir, a criação será tratada pelo import do schema
    }
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
