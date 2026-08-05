<h1>Meus Projetos</h1>

<?php

function listarArquivosPHP($pasta) {
    $arquivos = scandir($pasta);

    foreach ($arquivos as $arquivo) {
        if ($arquivo != "." && $arquivo != "..") {
            $caminho = $pasta . "/" . $arquivo;

            if (is_dir($caminho)) {
                // entra na subpasta
                listarArquivosPHP($caminho);
            } else {
                // verifica se é .php
                if (pathinfo($arquivo, PATHINFO_EXTENSION) == "php") {
                    echo "<li><a href='$caminho'>$caminho</a></li>";
                }
            }
        }
    }
}

$pastas = scandir(".");

foreach ($pastas as $pasta) {
    if ($pasta != "." && $pasta != ".." && is_dir($pasta)) {

        echo "<h2>$pasta</h2>";
        echo "<ul>";

        listarArquivosPHP($pasta);

        echo "</ul>";
    }
}

?>