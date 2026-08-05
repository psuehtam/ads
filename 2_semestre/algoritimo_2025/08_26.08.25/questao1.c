#include <stdio.h>
int main (){
	//mude aqui qual questao quer executar
	questao4();
}

int questao1(){
	int number;
	printf("digite um numero: ");
	scanf("%d", &number);
	
		if	(number <0){
			printf("O numero informado eh negativo \n");
		}
		
		if (number >0 || 0 <=100){
			printf ("O numero informado eh menor que 100 \n");
		}
		
		if (number >100){
			printf ("O numero informado eh maior que 100 \n");
		}
		
return 0;	
}
 
 
int questao2(){
	
	int number;
	int resto;
	int resultado =0;
	
	printf("digite um numero n: ");
	scanf("%d", &number);
	
	for(int i = 0; i <number; i ++){
		resto = i % 2;
		if (resto == 0){
			resultado += i;
		}
	}
printf("O valor da somatoria de todos os numeros pares entre 1 e n eh %d", resultado);
		
return 0;	
}
	
	
int questao3(){
	 int contador = 0;
//o codigo estava <=10 se eu deixa = ele vai somar 10+1, se eu coloco <10 ele vai somar os de antes
   while (contador < 10){

      contador = contador +1;

      printf("Contador eh: %d\n", contador);

   }

}

int questao4(){
	int number, tentativas;
	
	printf("digite um numero: ");
	scanf("%d", &number);
	
		while (number != 4071){
			printf("informe um novo numero! \n");
			scanf("%d", &number);
		tentativas ++;
		}
					printf("Parabens! Voce acertou o numero oculto! \n");
					printf("Voce levou %d tentativas para acertar", tentativas);

return 0;	
}


int questao5(){
	int number1;
	int number2;
	int number3;

	
	printf("digite um numero: ");
	scanf("%d", &number1);
	printf("digite um numero: ");
	scanf("%d", &number2);
	printf("digite um numero: ");
	scanf("%d", &number3);
	
	if(number1 > number2 && number2 > number3){
		printf("%d %d %d", number3, number2, number1);
	}
	if(number1 > number3 && number3 > number2){
		printf("%d %d %d", number2, number3, number1);
	}
	if(number2 > number1 && number1 > number3){
		printf("%d %d %d", number3, number1, number2);
	}
	if(number2 > number3 && number3 > number1){
		printf("%d %d %d", number1, number3, number2);
	}
	if(number3 > number1 && number1 > number2){
		printf("%d %d %d", number2, number1, number3);
	}
	if(number3 > number2 && number2 > number1){
		printf("%d %d %d", number1, number2, number3);
	}
return 0;	
}














