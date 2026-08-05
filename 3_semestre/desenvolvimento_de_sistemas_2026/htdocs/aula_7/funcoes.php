<?php

function inserirProduto(PDO $pdo, string $nome, float $preco, int $quantidade): bool
{
    $sql = "INSERT INTO produtos (nome, preco, quantidade)
            VALUES (:nome, :preco, :quantidade)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => $quantidade,
    ]);
}

function listarProdutos(PDO $pdo): array
{
    $sql = "SELECT * FROM produtos ORDER BY nome ASC";

    return $pdo->query($sql)->fetchAll();
}

function buscarProduto(PDO $pdo, int $id): ?array
{
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $produto = $stmt->fetch();

    return $produto ?: null;
}

function buscarPorNome(PDO $pdo, string $termo): array
{
    $sql = "SELECT * FROM produtos
            WHERE nome LIKE :termo
            ORDER BY nome ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['termo' => "%$termo%"]);

    return $stmt->fetchAll();
}

function validarCampos($nome, $preco, $quantidade): bool
{
    return $nome !== ''
        && is_numeric($preco)
        && filter_var($quantidade, FILTER_VALIDATE_INT) !== false
        && (int) $quantidade >= 0;
}
