<?php
$base_url = "../";
$nome = "Matheus";
$sobrenome = "Pupia";
$idade = "19 Anos";
$cidade = "Colombo/PR";
$curso = "Análise e Desenvolvimento de Sistemas";
$periodo = "3º Período";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Mim - <?php echo $nome; ?></title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/about.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/navbar.css">
</head>

<body>
    <?php
    include $base_url . 'includes/navbar.php';
    ?>
    
    <div class="container">
        <div class="title">
            <h1>Sobre mim</h1>
        </div>
        
        <div class="informations">
            <div class="info-card">
                <strong>Nome:</strong> <?php echo $nome . " " . $sobrenome; ?>
            </div>
            
            <div class="info-card">
                <strong>Idade:</strong> <?php echo $idade; ?>
            </div>
            
            <div class="info-card">
                <strong>Cidade:</strong> <?php echo $cidade; ?>
            </div>
            
            <div class="info-card">
                <strong>Curso:</strong> <?php echo $curso; ?>
            </div>
            
            <div class="info-card">
                <strong>Período:</strong> <?php echo $periodo; ?>
            </div>
        </div>
    </div>

</body>

</html>