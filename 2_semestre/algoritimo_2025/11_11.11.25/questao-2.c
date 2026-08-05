#include <stdio.h>

int fatorial (int n){
	int result = 1;
	
	for(int i = 1; i <=n; i++){
		result *= i;
	}
	
	return result;
}

int main(){
	
	int fat;
	printf("CALCULADORA DE FATORIAL\n");
	printf("\n");
	printf("Digite o numero:");
	scanf("%d", &fat);

	printf("O fatorial de %d eh: %d", fat, fatorial(fat));

	return 0;	
}
