#include <stdio.h>
#include <windows.h>
#include <stdlib.h>
#include <time.h>


int main(){
    char jogador1[50], jogador2[50]; //nomes
    
    char tabuleiro[10][10] = {
    {' ', ' ',' ', ' ',' ', ' ',' ', ' ',' ', ' '},
    {' ', ' ',' ', ' ',' ', ' ',' ', ' ',' ', ' '} 	
};
   
    
    
    
    int mapa_j1[51], int mapa_j2[51];
    
    int mapa_tiro_j1[51], int mapa_tiroj2[51];
    
    int jogador_atual, qtdTurnos, escolha;

}

int main() {
	printf("%c", tabuleiro)

    printf("Nome para o Jogador 1: ");
    scanf("%s", jogador1);

    printf("Nome para o Jogador 2: ");
    scanf("%s", jogador2);
    printf("\n");

    printf("Qual a quantidade de turnos?: ");
    scanf("%d", &qtdTurnos);
    printf("\n");

    // Animação de sorteio
    for (int i = 0; i < 3; i++) {
        printf("Sorteando%s\r", (i == 0) ? "." : (i == 1) ? ".." : "...");
        fflush(stdout);
        Sleep(500);
    }

    // Sorteio
    srand(time(NULL));
    int sorteio = rand() % 2;
    jogador_atual = sorteio;

    printf("Quem inicia eh... %s!\n", sorteio == 0 ? jogador1 : jogador2);
    Sleep(1500);

    // Loop de turnos
    for (int turno = 1; turno <= qtdTurnos; turno++) {
        system("cls"); // limpa tela a cada turno
        printf("===== TURNO %d =====\n\n", turno);
        printf("%s: Vida=%d | Ataque=%d | Defesa=%d\n", jogador1, vida1, ataq1, def1);
        printf("%s: Vida=%d | Ataque=%d | Defesa=%d\n\n", jogador2, vida2, ataq2, def2);

        // Escolha do jogador atual
        char *nomeAtual = (jogador_atual == 0) ? jogador1 : jogador2;
        char *nomeOponente = (jogador_atual == 0) ? jogador2 : jogador1;

        int *vidaAtual = (jogador_atual == 0) ? &vida1 : &vida2;
        int *vidaOponente = (jogador_atual == 0) ? &vida2 : &vida1;
        int *ataqAtual = (jogador_atual == 0) ? &ataq1 : &ataq2;
        int *defAtual = (jogador_atual == 0) ? &def1 : &def2;
        int *defOponente = (jogador_atual == 0) ? &def2 : &def1;

        printf("%s, escolha entre:\n", nomeAtual);
        printf("1 = Atacar\n");
        printf("2 = Ganhar Buff (aumenta ataque ou defesa)\n");
        printf("Sua escolha: ");
        scanf("%d", &escolha);
        printf("\n");

        switch (escolha) {
            case 1: { // Ataque
                int dano = calcular_dano(*ataqAtual, *defOponente);
                *vidaOponente -= dano;

                printf("%s atacou %s e causou %d de dano!\n", nomeAtual, nomeOponente, dano);
                Sleep(1000);

                // Atualização dinâmica de status
                printf("%s: Vida=%d | %s: Vida=%d\r", jogador1, vida1, jogador2, vida2);
                fflush(stdout);
                Sleep(1500);
                printf("\n\n");
                break;
            }

            case 2: { // Buff
                int tipo_buff;
                printf("%s, voce escolheu Buff, escolha entre:\n", nomeAtual);
                printf("1 = + Ataque\n");
                printf("2 = + Defesa\n");
                printf("Sua escolha: ");
                scanf("%d", &tipo_buff);
                printf("\n");

                switch (tipo_buff) {
                    case 1: {
                        int buff_ataq = (rand() % 3) + 1;
                        *ataqAtual += buff_ataq;
                        printf("%s ganhou +%d de ataque! Agora tem %d de ataque.\n", nomeAtual, buff_ataq, *ataqAtual);
                        break;
                    }
                    case 2: {
                        int buff_def = (rand() % 3) + 1;
                        *defAtual += buff_def;
                        printf("%s ganhou +%d de defesa! Agora tem %d de defesa.\n", nomeAtual, buff_def, *defAtual);
                        break;
                    }
                }
                Sleep(1500);
                break;
            }
        }

        // Checa se alguém perdeu
        if (vida1 <= 0 || vida2 <= 0) {
            system("cls");
            printf("\n=== FIM DE JOGO ===\n");
            if (vida1 <= 0) {
                printf("%s foi derrotado!\n", jogador1);
                printf("?? %s venceu a partida!\n", jogador2);
            } else {
                printf("%s foi derrotado!\n", jogador2);
                printf("?? %s venceu a partida!\n", jogador1);
            }
            break;
        }

        // Alterna jogador
        jogador_atual = (jogador_atual == 0) ? 1 : 0;

        Sleep(1500);
    }

    // Fim por turnos
    if (vida1 > 0 && vida2 > 0) {
        system("cls");
        printf("=== FIM DE JOGO ===\n");
        if (vida1 > vida2) {
            printf("?? %s venceu com mais vida!\n", jogador1);
        } else if (vida2 > vida1) {
            printf("?? %s venceu com mais vida!\n", jogador2);
        } else {
            printf("?? Empate! Ambos com a mesma vida.\n");
        }
        printf("\nStatus final:\n");
        printf("%s: Vida=%d, Ataque=%d, Defesa=%d\n", jogador1, vida1, ataq1, def1);
        printf("%s: Vida=%d, Ataque=%d, Defesa=%d\n", jogador2, vida2, ataq2, def2);
    }

    return 0;
}

