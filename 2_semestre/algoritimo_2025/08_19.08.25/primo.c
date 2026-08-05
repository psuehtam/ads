#include <stdio.h>
#include "menu.h"  // Inclui seu header

void programa3() {
	int n;
	
	printf("digite o numero: ");
	scanf("%d", &n);
	
	for (int i = 0; i < n; i++){
		if (n % i == 0){
			printf("\n %d nao eh primo", n);
		
		} else {
			printf ("\n %d eh primo", n);
		}
		
	}

}
