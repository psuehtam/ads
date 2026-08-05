#include <stdio.h>

int main(){
	int n;
	float maior, menor;
	
	
	printf("Digite a quantidade de alunos: ");
	scanf("%d", &n);
	float notas[n];
	
	for (int i = 0; i < n; i++){
		printf("Digite a nota do aluno %d: ",i+1);
		scanf("%f",&notas[i]);
	}
	for (int i = 0; i < n; i++){
		printf("aluno %d nota %2.f\n", i+1, notas[i]);
	}
	
	maior = notas[0];
	menor = notas[0];
	
	for (int i =0; i<n; i++){
		if(notas[i] > maior){
			maior = notas[i];
		}
		if(notas[i] < menor){
			menor = notas[i];
		}
	}
	printf("\nA maior nota foi: %.2f\n", maior);
    printf("A menor nota foi: %.2f\n", menor);

return 0;
}
