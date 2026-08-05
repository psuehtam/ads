#include <stdio.h>

int main(){
	int n = 10;
	int maior, menor;
	
	int vetor[10];
	
	for (int i = 0; i < n; i++){
		printf("v[%d]: ", i);
		scanf("%d",&vetor[i]);
	}
	for (int i = 0; i < n; i++){
		printf("%3d",vetor[i]);
	}
	
	maior = vetor[0];
	menor = vetor[0];
	
	for (int i =0; i<n; i++){
		if(vetor[i] > maior){
			maior = vetor[i];
		}
		if(vetor[i] < menor){
			menor = vetor[i];
		}
	}
	printf("\no menor numero foi: %d\n", menor);
	printf("o maior numero foi: %d\n", maior);
    
    
    printf("%d",menor);
    for (int i = 1;i < n-1; i++){
    	printf("%d", vetor[i]);
	}
    printf("%d",maior);
    return 0;
}

