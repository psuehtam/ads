#include <stdio.h>

int main() {
  int n;
  printf("Digite o tamanho da matriz: ");
  scanf("%d", & n);

  int matriz[n][n];
  int topo = 0, baixo = n - 1, esquerda = 0, direita = n - 1;
  int limite = 1;

  while (limite <= n * n) {
for (int i = baixo;   i >= topo    && limite <= n*n; i--) matriz[i][direita] = limite++;
direita--;
for (int j = direita; j >= esquerda && limite <= n*n; j--) matriz[topo][j] = limite++;
topo++;
for (int i = topo;    i <= baixo  && limite <= n*n; i++) matriz[i][esquerda] = limite++;
esquerda++;
for (int j = esquerda; j <= direita && limite <= n*n; j++) matriz[baixo][j] = limite++;
baixo--;
}

  printf("\nMatriz resultante:\n");
  for (int i = 0; i < n; i++) {
    for (int j = 0; j < n; j++)
      printf("%3d ", matriz[i][j]);
    printf("\n");
  }

  return 0;
}
