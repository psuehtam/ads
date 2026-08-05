<?php
// Ler cookie ou começar em 0
if (isset($_COOKIE['visitas'])) {
    $visitas = $_COOKIE['visitas'];
} else {
    $visitas = 0;
}
$visitas++;
// Salvar cookie atualizado com duração de 7 dias
setcookie('visitas', $visitas, time() + (7 * 24 * 60 * 60));
?>
<h1>Contador de Visitas</h1>
<p>Você visitou esta página <?= $visitas ?> vez(es).</p>