#include <stdio.h>

int main() {
    int menu;
    printf("=== Menu ===\n");
    printf("1 - Numeros fixos\n");
    printf("2 - Digitar os numeros\n");
    printf("Escolha uma opcao: ");
    scanf("%d", &menu);

    int n;

    switch (menu) {
        case 1: {
            printf("Digite o tamanho da matriz: ");
            scanf("%d", &n);

            int matriz[n][n];

            int topo = 0, baixo = n - 1, esquerda = 0, direita = n - 1;
            int limite = 1;

            while (limite <= n * n) {
                for (int j = esquerda; j <= direita && limite <= n * n; j++)
                    matriz[topo][j] = limite++;
                topo++;
                for (int i = topo; i <= baixo && limite <= n * n; i++)
                    matriz[i][direita] = limite++;
                direita--;
                for (int j = direita; j >= esquerda && limite <= n * n; j--)
                    matriz[baixo][j] = limite++;
                baixo--;
                for (int i = baixo; i >= topo && limite <= n * n; i--)
                    matriz[i][esquerda] = limite++;
                esquerda++;
            }

            // Imprimindo a matriz
            printf("Matriz:\n");
            for (int i = 0; i < n; i++) {
                for (int j = 0; j < n; j++)
                    printf("%3d ", matriz[i][j]);
                printf("\n");
            }
            break;
        }

        case 2: {
            printf("Digite o tamanho da matriz: ");
            scanf("%d", &n);

            int matriz[n][n];
            int espiral[n][n]; // matriz para preencher na ordem espiral

            // Lendo os valores da matriz
            printf("Digite os valores da matriz (linha por linha):\n");
            for (int i = 0; i < n; i++) {
                for (int j = 0; j < n; j++)
                    scanf("%d", &matriz[i][j]);
            }

            // Preenchendo a matriz espiral
            int topo = 0, baixo = n - 1, esquerda = 0, direita = n - 1;
            int idx = 0;

            int valores[n*n];
            // copiar todos os valores para um vetor para facilitar o preenchimento
            for (int i = 0; i < n; i++)
                for (int j = 0; j < n; j++)
                    valores[idx++] = matriz[i][j];

            idx = 0; // reiniciar índice
            while (topo <= baixo && esquerda <= direita) {
                for (int j = esquerda; j <= direita; j++)
                    espiral[topo][j] = valores[idx++];
                topo++;
                for (int i = topo; i <= baixo; i++)
                    espiral[i][direita] = valores[idx++];
                direita--;
                for (int j = direita; j >= esquerda; j--)
                    espiral[baixo][j] = valores[idx++];
                baixo--;
                for (int i = baixo; i >= topo; i--)
                    espiral[i][esquerda] = valores[idx++];
                esquerda++;
            }

            // Imprimindo a matriz em espiral
            printf("Matriz em espiral:\n");
            for (int i = 0; i < n; i++) {
                for (int j = 0; j < n; j++)
                    printf("%3d ", espiral[i][j]);
                printf("\n");
            }
            break;
        }

        default:
            printf("Opcao invalida!\n");
    }

    return 0;
}

