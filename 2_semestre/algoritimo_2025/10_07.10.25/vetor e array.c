#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <windows.h>
#include <time.h>
#include <ctype.h>
	
void mostrarTabela(char tabelaBase[10][10]) {
    printf("  ");
    for (int c = 0; c < 10; c++) {
        printf(" %d ", c);
    }
    printf("\n");

    for (int linha = 0; linha < 10; linha++) {
        printf("%d ", linha);
        for (int coluna = 0; coluna < 10; coluna++) {
            printf("[%c]", tabelaBase[linha][coluna]);
        }
        printf("\n");
    }
}

void posicaoAleatoria (char tabelaAleatoria [10][10]){
	srand(time(NULL));

	int colocado = 0;
	while(colocado <10){
	
	int linha = rand() % 10;	
	int coluna = rand() % 10;
	
	
	if (tabelaAleatoria [linha][coluna] != '*'){
		tabelaAleatoria [linha][coluna] = '*';
		colocado++;
		}	
	} 	
}

	
	
int main(){
	char tabela [10][10];
	for (int l = 0; l <10; l++){
		for (int c = 0; c <10; c++){
			tabela [l][c] = ' ';	
		}
	}	

	posicaoAleatoria(tabela);
	
	mostrarTabela(tabela);
	
	return 0;
}
