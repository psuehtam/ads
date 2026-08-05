#include <stdio.h>
#include <windows.h>
#include <stdlib.h>
#include <time.h>

int main() {

  int menu;
  printf("=====MENU=====\n");
  printf("1 - Jogo Turno\n");
  printf("2 - Quadrados\n");
  printf("3 - Tabuada\n");

  printf("Escolha qual executar: ");

  scanf("%d", & menu);

  switch (menu) {
  
    case 1: {
    char jogador1[50], jogador2[50], inicia[] = "QUEM INICIA EH...";
    int vida1 = 10, vida2 = 10;
    int ataq1 = 2, ataq2 = 2;
    int def1 = 2, def2 = 2;
    int jogador_atual, qtdTurnos;
    int escolha; // CORREÇÃO: Alterado de char para int

    printf("\nNome para o Jogador 1: ");
    scanf("%s", jogador1);

    printf("Nome para o Jogador 2: ");
    scanf("%s", jogador2);
    printf("\n");
    
    printf("Qual a quantidade de turnos?: ");
    scanf("%d", &qtdTurnos);
    printf("\n");
    
    // Animação de texto "QUEM INICIA EH..."
    for (int i = 0; inicia[i] != '\0'; i++) {
        printf("%c", inicia[i]);
        fflush(stdout);
        Sleep(200);
    }

    // Sorteio de quem inicia
    srand(time(NULL)); // CORREÇÃO: Movido para fora do loop
    int sorteio = rand() % 2;
    jogador_atual = sorteio;

    if (sorteio == 0) {
        printf(" %s\n", jogador1);
    } else {
        printf(" %s\n", jogador2);
    }

    // Loop turnos
    for (int turno = 1; turno <= qtdTurnos; turno++) {
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
                    int dano = ataq1 - def2;
                    if (dano < 1) dano = 1;
                    vida2 -= dano;
                    printf("%s atacou %s e causou %d de dano!\n", jogador1, jogador2, dano);
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
                            break;
                        } // Fim case 1 (Buff de ataque)
                        
                        case 2: { // Buff de defesa
                            int buff_def = (rand() % 3) + 1; 
                            def1 += buff_def;
                            printf("%s ganhou +%d de defesa, a defesa de %s esta em %d\n", 
                                   jogador1, buff_def, jogador1, def1);
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
                    int dano = ataq2 - def1;
                    if (dano < 1) dano = 1;
                    vida1 -= dano;
                    printf("%s atacou %s e causou %d de dano!\n", jogador2, jogador1, dano);
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
                            break;
                        } // Fim case 1 (Buff de ataque)
                        
                        case 2: { // Buff de defesa
                            int buff_def = (rand() % 3) + 1;
                            def2 += buff_def;
                            printf("%s ganhou +%d de defesa, a defesa de %s esta em %d\n", 
                                   jogador2, buff_def, jogador2, def2);
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
    break;
} // FIM CASE 1


 
      case 2: {
        int n;
        int s;

        printf("\ndigite um numero \n");
        scanf("%d", & n);

        for (int i = 1; i <= n; i++) {
          for (int i = 1; i <= n; i++) {
            printf("[]", i);
          }
          printf("\n");
        }
        break;
      } //FIM CASE 2
        case 3: {
          int tabuadaNmr,
          tabuadaNmr1,
          tabuadaMult;

          printf("\nTabuada do ");
          scanf("%d", & tabuadaNmr);
          printf("ate do : ");
          scanf("%d", & tabuadaNmr1);

          printf("\n");
          printf("ate qual ai multiplicar: ");
          scanf("%d", & tabuadaMult);
          printf("\n");

          for (int i = tabuadaNmr; i <= tabuadaNmr1; i++) {
            printf("\n===TABUADA DO %d===\n", i);
            for (int j = 1; j <= tabuadaMult; j++) {

              printf("%d x %d = %d\n", i, j, (i * j));
            }
          }
          break;

        } //FIM CASE 3

    } //fim menu	
  return 0;
}
