<?php
$base_url = "../";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/contact.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php
    include $base_url . 'includes/navbar.php';
    ?>

    <div class="container">
        <h1>Contato</h1>
        <h2>Entre em contato comigo </h2>
        <div class="formulario">
            <form action="" method="POST">

                <div class="name">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="email">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="mensagem">
                    <label for="mensagem">Mensagem:</label>
                    <textarea id="mensagem" name="mensagem" required></textarea>
                </div>

                <input type="hidden" name="_subject" value="Novo contato do site!">
                <input type="hidden" name="_captcha" value="false">

                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>

</html>