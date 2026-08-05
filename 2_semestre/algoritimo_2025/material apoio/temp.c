#include <stdio.h>

int main() {
    int vetor[5] = {10, 20, 30, 40, 50};
    int temp;

    printf("Antes da troca:\n");
    for (int i = 0; i < 5; i++) {
        printf("%d ", vetor[i]);
    }

    for (int i = 0; i < 5 / 2; i++) {
        temp = vetor[i];
        vetor[i] = vetor[4 - i];
        vetor[4 - i] = temp;
    }

    printf("\n\nDepois da troca:\n");
    for (int i = 0; i < 5; i++) {
        printf("%d ", vetor[i]);
    }

    return 0;
}

