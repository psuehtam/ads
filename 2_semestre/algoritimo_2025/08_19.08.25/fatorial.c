#include <stdio.h>
#include "menu.h"  // Inclui seu header

void programa1() {
    printf("\n=== FATORIAL ===\n");
    int n;
    int fatorial =1;
    
    printf("digite um numero inteiro: ");
    scanf("%d", &n);
	for(int i = 1; i <= n; i++){
		fatorial = fatorial * i;
	}
	
	
	printf("%d! %d\n",n, fatorial);

}
