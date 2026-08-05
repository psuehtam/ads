#include <stdio.h>

int main() {
    int n = 10;
    int vetor[n];
    int temp;
    int maior, menor;

    printf("Digite os %d valores:\n", n);
    for (int i = 0; i < n; i++) {
        scanf("%d", &vetor[i]);
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
	
	   printf("\nAntes da troca:\n");
    for (int i = 0; i < n; i++){
        printf("%d ", vetor[i]);
    }

	printf("\no menor numero foi: %d\n", menor);
	printf("o maior numero foi: %d\n", maior);

 	for (int i = 0; i < n; i++){
        vetor[n - 1 -i];
        }
        
 	 for (int i = 0; i < n; i++) {
        printf("%d ", vetor[n - 1- i]);
    }
 	
    

    return 0;
}

