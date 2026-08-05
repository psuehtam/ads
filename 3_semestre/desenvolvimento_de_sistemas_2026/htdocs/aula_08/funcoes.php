<?php

function inserirProduto(PDO $pdo, string $nome, float $preco, int $quantidade): bool {
    $sql = "INSERT INTO produtos (nome, preco, quantidade)
            VALUES (:nome, :preco, :quantidade)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => $quantidade,
    ]);
}

function listarProdutos(PDO $pdo): array {
    $sql = "SELECT * FROM produtos WHERE ativo = TRUE ORDER BY nome ASC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function buscarProduto(PDO $pdo, int $id): ?array {
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $produto = $stmt->fetch();
    return $produto ?: null;
}

function buscarPorNome(PDO $pdo, string $termo): array {
    $sql = "SELECT * FROM produtos
            WHERE nome LIKE :termo AND ativo = TRUE
            ORDER BY nome ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['termo' => "%$termo%"]);
    return $stmt->fetchAll();
}

function validarCampos($nome, $preco, $quantidade): bool {
    return !empty($nome)
        && is_numeric($preco)
        && filter_var($quantidade, FILTER_VALIDATE_INT) !== false
        && (int) $quantidade >= 0;
}

function atualizarProduto(PDO $pdo, int $id, string $nome, float $preco, int $quantidade): int {
    $sql = "UPDATE produtos
            SET nome = :nome,
                preco = :preco,
                quantidade = :quantidade
            WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => $quantidade,
    ]);
    return $stmt->rowCount();
}

function excluirProduto(PDO $pdo, int $id): int {
    $sql = "DELETE FROM produtos
            WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->rowCount();
}

function desativarProduto(PDO $pdo, int $id): int {
    $sql = "UPDATE produtos
            SET ativo = FALSE
            WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->rowCount();
}

function reativarProduto(PDO $pdo, int $id): int {
    $sql = "UPDATE produtos
            SET ativo = TRUE
            WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->rowCount();
}

?>
