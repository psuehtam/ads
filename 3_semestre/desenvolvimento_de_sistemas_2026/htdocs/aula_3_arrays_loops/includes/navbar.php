<nav class="navbar">
    <ul class="nav-links">

        <?php
        $pasta = __DIR__ . "/../pages";
        $arquivos = scandir($pasta);

        foreach ($arquivos as $arquivo) {

            if ($arquivo != "." && $arquivo != "..") {

                $nome = pathinfo($arquivo, PATHINFO_FILENAME);

                echo "<li>
                        <a href='{$base_url}pages/$arquivo'>
                            " . ucfirst(str_replace("_", " ", $nome)) . "
                        </a>
                      </li>";
            }
        }
        ?>

    </ul>
</nav>