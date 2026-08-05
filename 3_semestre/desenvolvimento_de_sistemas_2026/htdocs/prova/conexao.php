<?php
// ============================================================
// Exercício 3: conexao.php
// Conexão PDO com tratamento de erro
// ============================================================

$host   = 'localhost';
$porta  = '3307';       // Troque para 3307 se aparecer erro [2002]
$banco  = 'catalogo';
$usuario = 'root';
$senha  = '';           // Ajuste conforme sua instalação do XAMPP

$dsn = "mysql:host={$host};port={$porta};dbname={$banco};charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $usuario, $senha);

    // Lança exceções para todos os erros de banco
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retorna resultados como arrays associativos por padrão
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Em produção, nunca exiba detalhes do erro para o usuário
    die('Erro de conexão: ' . $e->getMessage());
}
