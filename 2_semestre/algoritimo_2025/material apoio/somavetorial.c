#include <stdio.h>

void preencherV3(int n, float v1[], float v2[], float v3[]) {
    float soma_v2 = 0;

    // Soma todos os elementos de v2
    for (int i = 0; i < n; i++) {
        soma_v2 += v2[i];
    }

    // Preenche v3 conforme a regra
    for (int i = 0; i < n; i++) {
        v3[i] = v1[i] + soma_v2;
    }
}

int main() {
    int n;

    printf("Digite o tamanho dos vetores: ");
    scanf("%d", &n);

    float v1[n], v2[n], v3[n];

    printf("\nDigite os valores de v1:\n");
    for (int i = 0; i < n; i++) {
        printf("v1[%d]: ", i);
        scanf("%f", &v1[i]);
    }

    printf("\nDigite os valores de v2:\n");
    for (int i = 0; i < n; i++) {
        printf("v2[%d]: ", i);
        scanf("%f", &v2[i]);
    }

    preencherV3(n, v1, v2, v3);

    printf("\nVetor resultante v3:\n");
    for (int i = 0; i < n; i++) {
        printf("v3[%d] = %.2f\n", i, v3[i]);
    }

    return 0;
}

