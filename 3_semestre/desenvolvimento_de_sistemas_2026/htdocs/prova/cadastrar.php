<?php
// ============================================================
// Exercício 7: cadastrar.php
// Padrão "GET mostra o formulário, POST grava"
// ============================================================

require 'conexao.php';
require 'funcoes.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- Coleta e saneamento dos dados ---
    $titulo  = trim($_POST['titulo']  ?? '');
    $ano     = (int) ($_POST['ano']     ?? 0);
    $duracao = (int) ($_POST['duracao'] ?? 0);

    // Conversão do genero_id:
    // String vazia (opção "Sem gênero") → null
    // Valor preenchido → int
    $generoIdRaw = $_POST['genero_id'] ?? '';
    $generoId    = ($generoIdRaw === '') ? null : (int) $generoIdRaw;

    // --- Validação ---
    if ($titulo === '') {
        $erro = 'O título do filme é obrigatório.';
    } elseif ($ano < 1888 || $ano > 2100) {
        $erro = 'Informe um ano válido (entre 1888 e 2100).';
    } elseif ($duracao <= 0) {
        $erro = 'A duração deve ser maior que zero.';
    } else {
        // --- Inserção no banco ---
        inserirFilme($pdo, $titulo, $ano, $duracao, $generoId);

        // Redireciona para index.php após salvar
        header('Location: index.php');
        exit;
    }
}

// Carrega os gêneros ANTES do HTML para popular o <select>
$generos = listarGeneros($pdo);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Filme</title>
    <style>
        body        { font-family: Arial, sans-serif; margin: 2rem; }
        h1          { margin-bottom: 1rem; }
        label       { display: block; margin-top: 0.8rem; font-weight: bold; }
        input, select { padding: 0.4rem; width: 300px; }
        .erro       { color: red; margin-bottom: 1rem; }
        button      { margin-top: 1.2rem; padding: 0.5rem 1.5rem; }
        .voltar     { display: inline-block; margin-top: 1rem; }
    </style>
</head>
<body>

<h1>🎬 Cadastrar Novo Filme</h1>

<?php if ($erro !== ''): ?>
    <p class="erro"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<!-- O action aponta para a própria página; o método é POST -->
<form method="POST" action="cadastrar.php">

    <label for="titulo">Título *</label>
    <input
        type="text"
        id="titulo"
        name="titulo"
        value="<?= htmlspecialchars($_POST['titulo'] ?? '') ?>"
        required
    >

    <label for="ano">Ano *</label>
    <input
        type="number"
        id="ano"
        name="ano"
        min="1888"
        max="2100"
        value="<?= htmlspecialchars($_POST['ano'] ?? '') ?>"
        required
    >

    <label for="duracao">Duração (minutos) *</label>
    <input
        type="number"
        id="duracao"
        name="duracao"
        min="1"
        value="<?= htmlspecialchars($_POST['duracao'] ?? '') ?>"
        required
    >

    <label for="genero_id">Gênero</label>
    <select id="genero_id" name="genero_id">
        <!-- Opção vazia = filme sem gênero (genero_id = NULL) -->
        <option value="">Sem gênero</option>
        <?php foreach ($generos as $genero): ?>
            <option
                value="<?= (int) $genero['id'] ?>"
                <?= (isset($_POST['genero_id']) && (int) $_POST['genero_id'] === (int) $genero['id']) ? 'selected' : '' ?>
            >
                <?= htmlspecialchars($genero['nome']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br>
    <button type="submit">Salvar</button>

</form>

<a class="voltar" href="index.php">← Voltar para a listagem</a>

</body>
</html>
