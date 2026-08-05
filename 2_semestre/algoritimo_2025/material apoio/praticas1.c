#include <stdio.h>

int main() {
    int n;
    printf("Digite o tamanho da matriz: ");
    scanf("%d", &n);

    int inicio, sentido;
    printf("Escolha o canto de início:\n");
    printf("1 - Superior esquerdo\n");
    printf("2 - Superior direito\n");
    printf("3 - Inferior direito\n");
    printf("4 - Inferior esquerdo\n");
    printf("Opcao: ");
    scanf("%d", &inicio);

    printf("Escolha o sentido:\n");
    printf("1 - Horario\n");
    printf("2 - Anti-horario\n");
    printf("Opcao: ");
    scanf("%d", &sentido);

    int matriz[n][n];
    int topo = 0, baixo = n - 1, esquerda = 0, direita = n - 1;
    int limite = 1;

    // dependendo da combinação, muda a ordem dos loops
    while (limite <= n * n) {
        if (inicio == 1 && sentido == 1) { 
            // superior esquerdo, horário (padrão)
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
        else if (inicio == 3 && sentido == 1) { 
            // inferior direito, horário
            for (int j = direita; j >= esquerda && limite <= n * n; j--)
                matriz[baixo][j] = limite++;
            baixo--;
            for (int i = baixo; i >= topo && limite <= n * n; i--)
                matriz[i][esquerda] = limite++;
            esquerda++;
            for (int j = esquerda; j <= direita && limite <= n * n; j++)
                matriz[topo][j] = limite++;
            topo++;
            for (int i = topo; i <= baixo && limite <= n * n; i++)
                matriz[i][direita] = limite++;
            direita--;
        }
        else if (inicio == 1 && sentido == 2) {
            // superior esquerdo, anti-horário
            for (int i = topo; i <= baixo && limite <= n * n; i++)
                matriz[i][esquerda] = limite++;
            esquerda++;
            for (int j = esquerda; j <= direita && limite <= n * n; j++)
                matriz[baixo][j] = limite++;
            baixo--;
            for (int i = baixo; i >= topo && limite <= n * n; i--)
                matriz[i][direita] = limite++;
            direita--;
            for (int j = direita; j >= esquerda && limite <= n * n; j--)
                matriz[topo][j] = limite++;
            topo++;
        }
        else if (inicio == 3 && sentido == 2) {
            // inferior direito, anti-horário
            for (int i = baixo; i >= topo && limite <= n * n; i--)
                matriz[i][direita] = limite++;
            direita--;
            for (int j = direita; j >= esquerda && limite <= n * n; j--)
                matriz[topo][j] = limite++;
            topo++;
            for (int i = topo; i <= baixo && limite <= n * n; i++)
                matriz[i][esquerda] = limite++;
            esquerda++;
            for (int j = esquerda; j <= direita && limite <= n * n; j++)
                matriz[baixo][j] = limite++;
            baixo--;
        }
        else {
            printf("Combinação ainda não implementada!\n");
            break;
        }
    }

    // imprimir
    printf("\nMatriz resultante:\n");
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++)
            printf("%3d ", matriz[i][j]);
        printf("\n");
    }

    return 0;
}

