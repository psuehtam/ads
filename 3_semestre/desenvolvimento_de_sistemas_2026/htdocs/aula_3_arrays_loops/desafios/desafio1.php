<?php

    $produtos = [
        [
            "nome" => "Celular",
            "quantidade" => 10,
            "preco" => 1500,
            "categoria" => "Eletrônicos"
        ],
        [
            "nome" => "Geladeira",
            "quantidade" => 5,
            "preco" => 3500,
            "categoria" => "Eletrodomésticos"
        ],
        [
            "nome" => "Sofá",
            "quantidade" => 3,
            "preco" => 1200,
            "categoria" => "Móveis"
        ],
        [
            "nome" => "Notebook",
            "quantidade" => 7,
            "preco" => 4000,
            "categoria" => "Eletrônicos"
        ]
    ];

    echo "<h2>Lista de Produtos</h2>";

    $totalEstoque = 0;
    $somaPrecos = 0;
    $contador = 0;

    $categorias = [];

    foreach ($produtos as $produto) {

        echo "Nome: {$produto['nome']} | ";
        echo "Quantidade: {$produto['quantidade']} | ";
        echo "Preço: R$ " . number_format($produto['preco'], 2, ",", ".") . " | ";
        echo "Categoria: {$produto['categoria']}<br>";
        $totalEstoque += $produto['preco'] * $produto['quantidade'];

        $somaPrecos += $produto['preco'];
        $contador++;

        $cat = $produto['categoria'];

        if (isset($categorias[$cat])) {
            $categorias[$cat]++;
        } else {
            $categorias[$cat] = 1;
        }
    }
    $media = $somaPrecos / $contador;

    $maisPresente = array_search(max($categorias), $categorias);

    echo "<br>";
    echo "Valor Total do Estoque: R$ " . number_format($totalEstoque, 2, ",", ".") . "<br>";
    echo "Média de Preços: R$ " . number_format($media, 2, ",", ".") . "<br>";
    echo "Categoria Mais Presente: $maisPresente";

    ?>