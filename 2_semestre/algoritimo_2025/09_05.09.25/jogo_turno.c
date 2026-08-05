#include <stdio.h>
#include <windows.h>
#include <stdlib.h>
#include <time.h>

	//funcao dano
	int calcular_dano(int atacante_ataque, int defensor_defesa) {
    int dano = atacante_ataque - defensor_defesa;
    if (dano < 1) dano = 1;
    return dano;
}

int main(){
    char jogador1[50], jogador2[50], inicia[] = "QUEM INICIA EH...";
    int vida1 = 10, vida2 = 10;
    int ataq1 = 2, ataq2 = 2;
    int def1 = 2, def2 = 2;
    int jogador_atual, qtdTurnos;
    int escolha;

    printf("Nome para o Jogador 1: ");
    scanf("%s", jogador1);

    printf("Nome para o Jogador 2: ");
    scanf("%s", jogador2);
    printf("\n");
    
    printf("Qual a quantidade de turnos?: ");
    scanf("%d", &qtdTurnos);
    printf("\n");
    
    // Animação de texto
    for (int i = 0; inicia[i] != '\0'; i++) {
        printf("%c", inicia[i]);
        fflush(stdout);
        Sleep(200);
    }

    // Sorteio
    srand(time(NULL));
    int sorteio = rand() % 2;
    jogador_atual = sorteio;

    if (sorteio == 0) {
        printf(" %s\n", jogador1);
        Sleep(2000);
    } else {
        printf(" %s\n", jogador2);
        Sleep(2000);
    }

    // Loop turnos
    for (int turno = 1; turno <= qtdTurnos; turno++) {
    	system("cls");
        printf("\n==TURNO== %d \n", turno);
        printf("%s: Vida=%d, Ataque=%d, Defesa=%d\n", jogador1, vida1, ataq1, def1);
        printf("%s: Vida=%d, Ataque=%d, Defesa=%d\n", jogador2, vida2, ataq2, def2);
        printf("\n");

        // Turno do Jogador 1
        if (jogador_atual == 0) {
            printf("%s, escolha entre:\n", jogador1);
            printf("1 = Atacar\n");
            printf("2 = Ganhar Buff (aumenta ataque ou defesa)\n");
            printf("Sua escolha: ");
            scanf("%d", &escolha);
            printf("\n");
            
            switch (escolha) {
                case 1: { // Ataque
                    int dano = calcular_dano(ataq1, def2); //funcao dano
                	vida2 -= dano;
                	printf("%s atacou %s e causou %d de dano!\n", jogador1, jogador2, dano);
                	Sleep(2000);
                	break;
                } // Fim case 1 (Ataque do Jogador 1)
                
                case 2: { // Buff
                    int tipo_buff;
                    printf("%s, voce escolheu aumentar Buff, entao escolha entre:\n", jogador1);
                    printf("1 = + Ataque\n");
                    printf("2 = + Defesa\n");
                    printf("Sua escolha: ");
                    scanf("%d", &tipo_buff);
                    printf("\n");
       
                    switch (tipo_buff) {
                        case 1: { // Buff de ataque
                            int buff_ataq = (rand() % 3) + 1;
                            ataq1 += buff_ataq;
                            printf("%s ganhou +%d de ataque, ataque de %s esta em %d\n",
                                   jogador1, buff_ataq, jogador1, ataq1);
                                   Sleep(2000);
                            break;
                        } // Fim case 1 (Buff de ataque)
                        
                        case 2: { // Buff de defesa
                            int buff_def = (rand() % 3) + 1; 
                            def1 += buff_def;
                            printf("%s ganhou +%d de defesa, a defesa de %s esta em %d\n",
                                   jogador1, buff_def, jogador1, def1);
                                   Sleep(2000); 
                            break;
                        } // Fim case 2 (Buff de defesa)
                    } // Fim switch tipo_buff
                    break;
                } // Fim case 2 (Buff do Jogador 1)
            } // Fim switch escolha (Jogador 1)
        } // Fim if Jogador 1
        // Turno do Jogador 2
        else {
            printf("%s, escolha entre:\n", jogador2);
            printf("1 = Atacar\n");
            printf("2 = Ganhar Buff (aumenta ataque ou defesa)\n");
            printf("Sua escolha: ");
            scanf("%d", &escolha);
            printf("\n");
            
            switch (escolha) {
                case 1: { // Ataque
                    int dano = calcular_dano(ataq2, def1); //funcao dano
                	vida1 -= dano;
                	printf("%s atacou %s e causou %d de dano!\n", jogador2, jogador1, dano);
                	Sleep(2000);
                	break;
                } // Fim case 1 (Ataque do Jogador 2)
                
                case 2: { // Buff
                    int tipo_buff;
                    printf("%s, voce escolheu aumentar Buff, entao escolha entre:\n", jogador2);
                    printf("1 = + Ataque\n");
                    printf("2 = + Defesa\n");
                    printf("Sua escolha: ");
                    scanf("%d", &tipo_buff);
                    printf("\n");
                    
                    switch (tipo_buff) {
                        case 1: { // Buff de ataque
                            int buff_ataq = (rand() % 3) + 1;
                            ataq2 += buff_ataq;
                            printf("%s ganhou +%d de ataque, o ataque de %s esta em %d\n",
                                   jogador2, buff_ataq, jogador2, ataq2);
                                   Sleep(2000);
                            break;
                        } // Fim case 1 (Buff de ataque)
                        
                        case 2: { // Buff de defesa
                            int buff_def = (rand() % 3) + 1;
                            def2 += buff_def;
                            printf("%s ganhou +%d de defesa, a defesa de %s esta em %d\n", 
                                   jogador2, buff_def, jogador2, def2);
                                   Sleep(2000);
                            break;
                        } // Fim case 2 (Buff de defesa)
                    } // Fim switch tipo_buff
                    break;
                } // Fim case 2 (Buff do Jogador 2)
            } // Fim switch escolha (Jogador 2)
        } // Fim else Jogador 2

        // Alternar jogador
        jogador_atual = (jogador_atual == 0) ? 1 : 0;
        
        // condições de vitória
        if (vida1 <= 0) {
            printf("%s Ganhou a Partida\n", jogador2);
            break;
        } else if (vida2 <= 0) {
            printf("%s Ganhou a Partida\n", jogador1);
            break;
        }
        
        // fim de jogo por turnos
        if (turno == qtdTurnos) {
            if (vida1 > vida2) {
                printf("%s esta com mais vida, portanto %s Ganhou a Partida\n", jogador1, jogador1);
            } else if (vida1 < vida2) {
                printf("%s esta com mais vida, portanto %s Ganhou a Partida\n", jogador2, jogador2);
            } else {
                printf("%s e %s estao com a mesma vida, portanto Empatou a Partida\n", jogador1, jogador2);
            }
            
            // Mostrar status finais
            printf("%s: Vida=%d, Ataque=%d, Defesa=%d\n", jogador1, vida1, ataq1, def1);
            printf("%s: Vida=%d, Ataque=%d, Defesa=%d\n", jogador2, vida2, ataq2, def2);
        }
    } // Fim for turno
	return 0;
} // FIM MAIN
