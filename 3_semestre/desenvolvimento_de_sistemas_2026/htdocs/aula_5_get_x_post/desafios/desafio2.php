<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário (POST)</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form method="post">
        <label>Nome:</label>
        <input type="text" name="nome"><br><br>
        
        <label>E-mail:</label>
        <input type="text" name="email"><br><br>
        
        <label>Idade:</label>
        <input type="number" name="idade"><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <?php
    // Verifica se a requisição foi feita por POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Operador de coalescência nula (??) para evitar erros de índice
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $idade = $_POST['idade'] ?? '';

        $erro = false;

        // Validação de nome
        if (empty($nome)) {
            $erro = true;
        }

        // Validação de e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro = true;
        }

        // Validação de idade (> 0 e numérica)
        if (!is_numeric($idade) || $idade <= 0) {
            $erro = true;
        }

        if ($erro) {
            // Mensagem de erro caso a validação falhe
            echo "<p style='color:red;'>Preencha todos os campos corretamente.</p>";
        } else {
            // Aplicar htmlspecialchars() em todos os dados exibidos por segurança
            $nome_seguro = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
            $email_seguro = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            $idade_segura = htmlspecialchars($idade, ENT_QUOTES, 'UTF-8');

            // Mensagem de sucesso
            echo "<h3>Bem-vindo(a), $nome_seguro!</h3>";
            echo "<p>Seu cadastro foi realizado com sucesso.</p>";
            echo "<p>E-mail: $email_seguro</p>";
            echo "<p>Idade: $idade_segura anos</p>";
        }
    }
    ?>
</body>
</html>