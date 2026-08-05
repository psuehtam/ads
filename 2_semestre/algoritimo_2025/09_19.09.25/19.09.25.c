#include <stdio.h>
int main(){
	int qtd;
	
		printf("digite a quatidade de numeros: ");
		scanf("%d", &qtd);
		int valor[qtd];
		
			for	(int i = 0; i<qtd; i++){
				printf("Digite o valor do numero %d: ", i+1);
				scanf("%d", &valor[i]);
			}

			int troca = 1;
			while (troca ==1){
				troca = 0;
				for (int i = 0; i < qtd - 1; i++){
					if(valor[i] > valor[i+1]){
						int temp;
						temp = valor[i];
						valor[i] = valor[i+1];
						valor[i+1] = temp;
						troca = 1;
					}
				}
			}
			for (int i = 0; i < qtd; i++){
				printf("numero %d valor: %d\n", i+1, valor[i]);
			}
	return 0;		
}
