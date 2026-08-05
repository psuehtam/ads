#include <stdio.h>

// Função que calcula o fatorial
int fatorial(int n) {
    int resultado = 1;

    for (int i = 1; i <= n; i++) {
        resultado *= i; // mesmo que resultado = resultado * i;
    }

    return resultado;
}

int main() {
    int num;

    printf("Digite um numero para calcular o fatorial: ");
    scanf("%d", &num);

    printf("O fatorial de %d é: %d\n", num, fatorial(num));

    return 0;
}

