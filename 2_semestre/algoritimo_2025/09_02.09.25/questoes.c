#include <stdio.h>
#include <math.h>
int main (){
	//mude aqui qual questao quer executar
	questao4();
}

int questao1(){
	float nota;
	float menor = 100.0;
	float maior = 0.0;
	int contador = 1;
	int n;
	
	printf("digite o numero de alunos\n");
	scanf("%d", &n);
	
	//condição de parada é maior ou igual a n (numero de alunos)
	while(contador <=n){
		printf("digite a nota do aluno %d\n", contador);
		scanf("%f", &nota);
		//ele pega o vaor que ja tinha antes, que é o 1, e vai adicionar mais 1, ficando 2
		//++ pra ele sempre adicionar 1 no contador

		contador ++;
		if (nota > maior){
			maior = nota;
		}
		if (nota < menor){
			menor = nota;
		}
	}
	printf("a nota maior foi %.2f e a nota menor foi %.2f", maior, menor);
return 0;
}

int questao2 (){
	int numero, valor;
	double raiz, resultado;
	
	printf ("digite um numero \n");
	scanf ("%d", &numero);
	
	valor = numero * 8;
	raiz = valor + 1;
	resultado = sqrt(raiz);
	
	if(resultado == (int)resultado) {
		printf("o numero %d eh triangular", numero);
	}	else {
		printf("o numero %d nao eh triangular", numero);
	}
return 0;	
}

int questaodois (){
	int n;
	
	printf ("digite um numero \n");
	scanf ("%d", &n);
	
	for(int i = 1; i <= n; i++){
		if ((i * (i+1) * (i+2)) == n){
		printf (" %d eh triangular", n);
	}
}
printf ("%d nao eh triangular", n);	
return 0;	
}


int questao3(){
	int n;
	int soma =0;
	
	printf ("digite um numero \n");
	scanf ("%d", &n);
	
	for(int i =1; i < n; i++){
		if (n % i == 0){
			soma = soma + i;
		}
	}
if (soma == n){
	printf("o numero %d eh perfeito", n);	
} else {
	printf("o numero %d nao eh perfeito", n);
}
return 0;	
}

int questao4 (){
	int n;
	int s;
	
	printf ("digite um numero \n");
	scanf ("%d", &n);
	
	for (int i = 1; i <=n; i++){	
	for(int i =1; i <= n; i++){
		printf("[]", i);
		}
	
	printf("\n");
	}
	


return 0;
}




	
