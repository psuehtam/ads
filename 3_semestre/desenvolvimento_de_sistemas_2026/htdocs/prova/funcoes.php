<?php
// ============================================================
// funcoes.php
// Funções auxiliares do catálogo de filmes
// Exercícios 4, 6 e 8
// ============================================================


// ------------------------------------------------------------
// Exercícios 4 e 8: listarFilmes()
//
// Retorna todos os filmes com o nome do gênero.
// Usa LEFT JOIN para incluir filmes sem gênero classificado.
// Parâmetro opcional $generoId: quando informado, filtra pelo gênero.
// ------------------------------------------------------------
function listarFilmes(PDO $pdo, ?int $generoId = null): array
{
    $sql = "SELECT
                f.id,
                f.titulo,
                f.ano,
                f.duracao_min,
                g.nome AS genero
            FROM filmes f
            LEFT JOIN generos g ON f.genero_id = g.id";

    // Monta a cláusula WHERE dinamicamente apenas quando necessário
    if ($generoId !== null) {
        $sql .= " WHERE f.genero_id = :genero_id";
    }

    $sql .= " ORDER BY f.titulo";

    $stmt = $pdo->prepare($sql);

    if ($generoId !== null) {
        $stmt->bindValue(':genero_id', $generoId, PDO::PARAM_INT);
    }

    $stmt->execute();

    return $stmt->fetchAll();
}


// ------------------------------------------------------------
// Exercício 6: listarGeneros()
//
// Retorna todos os gêneros ordenados por nome.
// Sem parâmetros vindos do usuário, pode usar query() direto.
// ------------------------------------------------------------
function listarGeneros(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT id, nome FROM generos ORDER BY nome");
    return $stmt->fetchAll();
}


// ------------------------------------------------------------
// Exercício 6: inserirFilme()
//
// Insere um novo filme usando prepared statement com
// placeholders nomeados — nunca concatene variáveis no SQL.
// $generoId pode ser null (filme sem gênero).
// ------------------------------------------------------------
function inserirFilme(
    PDO $pdo,
    string $titulo,
    int $ano,
    int $duracao,
    ?int $generoId
): void {
    $sql = "INSERT INTO filmes (titulo, ano, duracao_min, genero_id)
            VALUES (:titulo, :ano, :duracao_min, :genero_id)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':titulo',      $titulo,    PDO::PARAM_STR);
    $stmt->bindValue(':ano',         $ano,       PDO::PARAM_INT);
    $stmt->bindValue(':duracao_min', $duracao,   PDO::PARAM_INT);

    // PDO::PARAM_NULL é usado quando o valor é null
    if ($generoId === null) {
        $stmt->bindValue(':genero_id', null, PDO::PARAM_NULL);
    } else {
        $stmt->bindValue(':genero_id', $generoId, PDO::PARAM_INT);
    }

    $stmt->execute();
}
