#include <stdio.h>

int main() {
  int n = 10;
  int matriz[n][n];
  
  int sup = 0;
  int inf = n - 1; 
  int esq = 0;
  int dir = n - 1;
  
  int limite = 1;
  
  while (limite <= n * n) {
	for (int i = inf; i >= sup && limite <= n*n; i--)
		matriz[i][esq] = limite++;
	esq++;
	for (int j = esq;j <= dir && limite <= n*n; j++)
 		matriz[sup][j] = limite++;
	sup++;
	for (int i = sup;i <= inf  && limite <= n*n; i++)
 		matriz[i][dir] = limite++;
	dir--;
	for (int j = dir; j >= esq && limite <= n*n; j--)
 		matriz[inf][j] = limite++;
	inf--;
}
  
	for(int i = 0; i < 10; i++){
  		for (int j = 0; j < 10; j++)
  			printf("%4d", matriz[i][j]);
  		printf("\n");
	}

  return 0;
}
  
  

