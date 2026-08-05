<?php
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $idade = trim($_POST['idade'] ?? '');

    if (empty($nome) || empty($email) || empty($idade)) {
        $mensagem = '<div class="alert erro">Preencha todos os campos corretamente.</div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = '<div class="alert aviso">E-mail invalido. Verifique e tente novamente.</div>';
    } elseif (!is_numeric($idade) || (int) $idade <= 0) {
        $mensagem = '<div class="alert aviso">Informe uma idade valida (numero inteiro positivo).</div>';
    } else {
        $nome  = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $idade = (int) $idade;

        $mensagem  = '<div class="alert sucesso">';
        $mensagem .= '<h2>Bem-vindo(a), ' . $nome . '!</h2>';
        $mensagem .= '<p>Seu cadastro foi realizado com sucesso.</p>';
        $mensagem .= '<p><strong>E-mail:</strong> ' . $email . '</p>';
        $mensagem .= '<p><strong>Idade:</strong> ' . $idade . ' anos</p>';
        $mensagem .= '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio 2 - Cadastro de Usuario</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 2rem; background: #f4f6fb; color: #222; }
    main { max-width: 640px; margin: 0 auto; background: #fff; border: 1px solid #ddd; border-radius: 12px; padding: 1.5rem; }
    h1 { color: #1a237e; }
    label { display: block; margin-top: 1rem; font-weight: bold; }
    input {
      width: 100%; padding: 0.7rem; margin-top: 0.4rem;
      box-sizing: border-box; border: 1px solid #aaa; border-radius: 6px;
    }
    button {
      margin-top: 1.2rem; padding: 0.8rem 1.5rem;
      background: #00897b; color: #fff; border: none;
      border-radius: 8px; cursor: pointer; font-size: 1rem;
    }
    button:hover { background: #00695c; }
    .alert { margin-top: 1.5rem; padding: 1rem 1.2rem; border-radius: 10px; }
    .erro    { background: #fde7ea; color: #8a1c28; font-weight: bold; }
    .aviso   { background: #fff3cd; color: #7a5d00; font-weight: bold; }
    .sucesso { background: #e7f8f2; color: #16624d; }
    .sucesso h2 { margin-top: 0; }
  </style>
</head>
<body>
  <main>
    <h1>Cadastro de Usuario</h1>
    <p>Desafio 2 &mdash; Formulario com metodo <strong>POST</strong>. Os dados NAO aparecem na URL.</p>

    <form method="post">
      <label for="nome">Nome completo</label>
      <input id="nome" type="text" name="nome" required
             value="<?= htmlspecialchars($_POST['nome'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

      <label for="email">E-mail</label>
      <input id="email" type="email" name="email" required
             value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

      <label for="idade">Idade</label>
      <input id="idade" type="number" name="idade" min="1" required
             value="<?= htmlspecialchars($_POST['idade'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

      <button type="submit">Cadastrar</button>
    </form>

    <?= $mensagem !== '' ? $mensagem : '<p style="margin-top:1.2rem; color:#555;">Preencha o formulario para se cadastrar.</p>' ?>
  </main>
</body>
</html>
