#include <stdio.h>

void mostrarMapa(int mapa[10][10]){
	for(int x = 0; x <= 9; x++){
		for(int y = 0; y <= 9; y++){
			printf("%d", mapa[x][y]);
		}
		printf("\n");
	}
}

void colocarNavio(int quantidade, int tamanho, int mapa [10][10]){
	for(int j = 1; j <= quantidade; j++){
		int posicaoInvalida = 1;
		while(posicaoInvalida == 1){
			printf("Escola a Posicao do Navio %d\n", tamanho);
			int x, y, z, vertical;
			printf("Digite o valor de X: ");
			scanf("%d", &x);
			printf("Digite o valor de Y: ");
			scanf("%d", &y);
			printf("Digite 1 para Vertical | 2 para Horizontal: ");
			scanf("%d", &vertical);
			if(x + tamanho-1 > 9 && vertical == 2){
				printf("Posicao invalida, tente novamente\n");
			} else if (y + tamanho-1 > 9 &&vertical == 1){
				printf("Posicao invalida, tente novamente\n");
			} else {
			int navioExistente = 0;
			if(vertical == 1){
				for(int i = y; i <= tamanho-1; i++){
					if (mapa[x][i] == 0){
						mapa[x][i] = tamanho;
					} else {
						printf("Ja Existe um navio nessa posicao\n");
						navioExistente = 1;
						break;
					}
				}
			} else {
				for (int i = x; i <= tamanho-1; i++){
					if(mapa [i][y] == 0){
						mapa[i][y] = tamanho;
					} else {
						printf("Ja Existe um navio nessa posicao\n");
						navioExistente = 1;
						break;
						}
					}
				}
				if(navioExistente == 0){
					posicaoInvalida = 0;
				}
			}
		}
	}
}

void colocarPecas(int mapa[10][10]){
	mostrarMapa(mapa);
	colocarNavio(1, 5, mapa);
	colocarNavio(2, 4, mapa);
	colocarNavio(3, 3, mapa);
	colocarNavio(4, 2, mapa);
}
