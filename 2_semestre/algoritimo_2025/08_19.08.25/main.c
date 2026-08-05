#include <stdio.h>
#include "menu.h"  // Inclui seu header

int main() {
    int opcao;
    
    do {
        printf("\n=== MENU PRINCIPAL ===\n");
        printf("1. FATORIAL\n");
        printf("2. NUMERO PAR\n");
        printf("3. PRIMO\n");
        printf("0. Sair\n");
        printf("Escolha uma opcao: ");
        scanf("%d", &opcao);
        
        switch(opcao) {
            case 1:
                programa1();
                break;
            case 2:
                programa2();
                break;
            case 3:
                programa3();
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
