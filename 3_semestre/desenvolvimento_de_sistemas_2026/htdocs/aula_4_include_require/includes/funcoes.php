<?php
function autenticar(string $usuario, string $senha): bool {
    return $usuario === 'admin' && $senha === '1234';
}

function calcularBonus(float $salario): float {
    return $salario * 0.10;
}

function calcularINSS(float $salario): float {
    return $salario * 0.11;
}

function calcularSalarioLiquido(float $salario): float {
    $bonus = calcularBonus($salario);
    $inss = calcularINSS($salario);
    return $salario + $bonus - $inss;
}

function calcularSubtotal(float $preco, int $quantidade): float {
    return $preco * $quantidade;
}

function aplicarDesconto(float $subtotal, float $percentual): float {
    return $subtotal * ($percentual / 100);
}

function calcularFrete(float $subtotal): float {
    return $subtotal > 200 ? 0 : 25;
}