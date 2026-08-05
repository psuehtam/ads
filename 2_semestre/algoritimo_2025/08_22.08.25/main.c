#include <stdio.h>
#include "menu.h"  // Inclui seu header

int main() {
    int opcao;
    
    do {
        printf("\n=== MENU PRINCIPAL ===\n");
        printf("1. codigo 1\n");
        printf("2. codigo 2\n");
        printf("3. codigo 3\n");
        printf("0. Sair\n");
        printf("Escolha uma opcao: ");
        scanf("%d", &opcao);
        
        switch(opcao) {
            case 1:
                programa1();
                break;
            case 0:
                printf("Saindo...\n");
                break;
            default:
                printf("Opcao invalida!\n");
        }
        
    } while(opcao != 0);
    
    return 0;
}
