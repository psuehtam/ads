#include <stdio.h>
#include "menu.h"  // Inclui seu header

void programa2() {
    printf("\n=== NUMERO PAR ===\n");
	int numero;
	
	printf("Digite um numero: ");
scanf("%d", &numero);

for(int i = numero; i <= numero; i++) {  // ?? Este for só executa 1 vez!
    if(i % 2 == 0) {
        printf("%d eh par\n", i);
    } else {
        printf("%d eh impar\n", i);
    }
}

}
