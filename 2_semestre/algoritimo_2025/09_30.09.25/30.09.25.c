#include <stdio.h>

int soma(int a, int b){
return a + b;

}


int main(){
	int a, b;
	printf("digite o 1 numero\n");
	scanf("%d", &a);
	
	printf("digite o 2 numero\n");
	scanf("%d", &b);
	
	int resultado = soma(a, b);
		printf("%d", resultado);
	

return 0;
}
