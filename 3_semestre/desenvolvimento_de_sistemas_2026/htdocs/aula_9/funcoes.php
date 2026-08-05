<?php

function listarCategorias(PDO $pdo): array
{
    $sql = "SELECT id, nome
            FROM categorias
            ORDER BY nome";

    return $pdo->query($sql)->fetchAll();
}

function listarFornecedores(PDO $pdo): array
{
    $sql = "SELECT id, nome, telefone
            FROM fornecedores
            ORDER BY nome";

    return $pdo->query($sql)->fetchAll();
}

function validarCampos($nome, $preco, $quantidade): bool
{
    return $nome !== ''
        && is_numeric($preco)
        && (float) $preco >= 0
        && filter_var($quantidade, FILTER_VALIDATE_INT) !== false
        && (int) $quantidade >= 0;
}

function inserirProduto(
    PDO $pdo,
    string $nome,
    float $preco,
    int $quantidade,
    ?int $categoriaId,
    ?int $fornecedorId
): bool {
    $sql = "INSERT INTO produtos
            (nome, preco, quantidade, categoria_id, fornecedor_id)
            VALUES
            (:nome, :preco, :quantidade, :categoria_id, :fornecedor_id)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => $quantidade,
        'categoria_id' => $categoriaId,
        'fornecedor_id' => $fornecedorId,
    ]);
}

function listarProdutosComCategoria(PDO $pdo): array
{
    $sql = "SELECT p.id,
                   p.nome,
                   p.preco,
                   p.quantidade,
                   c.nome AS categoria,
                   f.nome AS fornecedor
            FROM produtos p
            LEFT JOIN categorias c ON c.id = p.categoria_id
            LEFT JOIN fornecedores f ON f.id = p.fornecedor_id
            ORDER BY p.nome";

    return $pdo->query($sql)->fetchAll();
}

function listarProdutosPorCategoria(PDO $pdo, int $categoriaId): array
{
    $sql = "SELECT p.id,
                   p.nome,
                   p.preco,
                   p.quantidade,
                   c.nome AS categoria,
                   f.nome AS fornecedor
            FROM produtos p
            INNER JOIN categorias c ON c.id = p.categoria_id
            LEFT JOIN fornecedores f ON f.id = p.fornecedor_id
            WHERE p.categoria_id = :cid
            ORDER BY p.nome";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cid' => $categoriaId]);

    return $stmt->fetchAll();
}

function buscarProduto(PDO $pdo, int $id): ?array
{
    $sql = "SELECT p.*,
                   c.nome AS categoria,
                   f.nome AS fornecedor
            FROM produtos p
            LEFT JOIN categorias c ON c.id = p.categoria_id
            LEFT JOIN fornecedores f ON f.id = p.fornecedor_id
            WHERE p.id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $produto = $stmt->fetch();

    return $produto ?: null;
}

function atualizarProduto(
    PDO $pdo,
    int $id,
    string $nome,
    float $preco,
    int $quantidade,
    ?int $categoriaId,
    ?int $fornecedorId
): int {
    $sql = "UPDATE produtos
            SET nome = :nome,
                preco = :preco,
                quantidade = :quantidade,
                categoria_id = :categoria_id,
                fornecedor_id = :fornecedor_id
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => $quantidade,
        'categoria_id' => $categoriaId,
        'fornecedor_id' => $fornecedorId,
    ]);

    return $stmt->rowCount();
}

function excluirProduto(PDO $pdo, int $id): int
{
    $sql = "DELETE FROM produtos
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    return $stmt->rowCount();
}

function inserirCategoria(PDO $pdo, string $nome): bool
{
    $sql = "INSERT INTO categorias (nome)
            VALUES (:nome)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute(['nome' => $nome]);
}

function atualizarCategoria(PDO $pdo, int $id, string $nome): int
{
    $sql = "UPDATE categorias
            SET nome = :nome
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nome' => $nome,
    ]);

    return $stmt->rowCount();
}

function buscarCategoria(PDO $pdo, int $id): ?array
{
    $sql = "SELECT id, nome
            FROM categorias
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $categoria = $stmt->fetch();

    return $categoria ?: null;
}

function excluirCategoria(PDO $pdo, int $id): int
{
    $sql = "DELETE FROM categorias
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    return $stmt->rowCount();
}

function contarProdutosPorCategoria(PDO $pdo, int $categoriaId): int
{
    $sql = "SELECT COUNT(*) AS qtd
            FROM produtos
            WHERE categoria_id = :cid";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cid' => $categoriaId]);

    return (int) $stmt->fetch()['qtd'];
}

function relatorioCategorias(PDO $pdo): array
{
    $sql = "SELECT c.nome AS categoria,
                   COUNT(p.id) AS total
            FROM categorias c
            LEFT JOIN produtos p ON p.categoria_id = c.id
            GROUP BY c.id, c.nome
            ORDER BY total DESC, c.nome";

    return $pdo->query($sql)->fetchAll();
}

function inserirFornecedor(PDO $pdo, string $nome, string $telefone): bool
{
    $sql = "INSERT INTO fornecedores (nome, telefone)
            VALUES (:nome, :telefone)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        'nome' => $nome,
        'telefone' => $telefone,
    ]);
}

function atualizarFornecedor(PDO $pdo, int $id, string $nome, string $telefone): int
{
    $sql = "UPDATE fornecedores
            SET nome = :nome,
                telefone = :telefone
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'telefone' => $telefone,
    ]);

    return $stmt->rowCount();
}

function buscarFornecedor(PDO $pdo, int $id): ?array
{
    $sql = "SELECT id, nome, telefone
            FROM fornecedores
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $fornecedor = $stmt->fetch();

    return $fornecedor ?: null;
}

function excluirFornecedor(PDO $pdo, int $id): int
{
    $sql = "DELETE FROM fornecedores
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    return $stmt->rowCount();
}

function contarProdutosPorFornecedor(PDO $pdo, int $fornecedorId): int
{
    $sql = "SELECT COUNT(*) AS qtd
            FROM produtos
            WHERE fornecedor_id = :fid";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['fid' => $fornecedorId]);

    return (int) $stmt->fetch()['qtd'];
}
