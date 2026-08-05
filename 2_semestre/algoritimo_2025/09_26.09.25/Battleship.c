#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <windows.h>
#include <time.h>
#include <ctype.h>

#define COR_AZUL 9
#define COR_VERDE 10
#define COR_VERMELHO 12
#define COR_AMARELO 14
#define COR_BRANCO 15

void mostrarMapa(char tabuleiro[10][10]) {
    HANDLE h = GetStdHandle(STD_OUTPUT_HANDLE);
    SetConsoleTextAttribute(h, COR_BRANCO);
    printf("    ");
    // Coordenadas das Colunas (A-J)
    for (char c = 'A'; c <= 'J'; c++) {
        printf(" %c ", c);
    }
    printf("\n");
    for (int l = 0; l < 10; l++) {
        // Coordenadas das Linhas (0-9)
        SetConsoleTextAttribute(h, COR_BRANCO);
        printf("%2d  ", l);
        for (int col = 0; col < 10; col++) {
            char celula = tabuleiro[l][col];

            // Define a cor da célula
            if (celula == '*') {
                SetConsoleTextAttribute(h, COR_BRANCO);
            } else if (celula == ' ') {
                SetConsoleTextAttribute(h, COR_AZUL);
            } else if (celula == 'X') {
                SetConsoleTextAttribute(h, COR_VERDE);
            } else if (celula == 'O') {
                SetConsoleTextAttribute(h, COR_VERMELHO);
            } else {
                SetConsoleTextAttribute(h, COR_BRANCO);
            }

            // Imprime o conteúdo da célula com a cor definida
            printf("[%c]", celula);
        }
        printf("\n");
    }
    // Reseta a cor para o padrão (Branco)
    SetConsoleTextAttribute(h, COR_BRANCO);
}

void posicionar(char tabuleiro[10][10], char nome_jogador[], int navios[], int qtdNavios) {
    HANDLE h = GetStdHandle(STD_OUTPUT_HANDLE);

    SetConsoleTextAttribute(h, COR_BRANCO);
    printf("--- Vez de %s ---\n", nome_jogador);
    printf("Posicione seus navios!\n");

    for (int nav = 0; nav < qtdNavios; nav++) {
        mostrarMapa(tabuleiro);

        int linha, coluna, direcao;
        char letra_coluna;
        char input[10];

        SetConsoleTextAttribute(h, COR_BRANCO);
        printf("Posicionando navio de tamanho ");
        // Destaca o tamanho do navio em Verde
        SetConsoleTextAttribute(h, COR_VERDE);
        printf("%d", navios[nav]);
        SetConsoleTextAttribute(h, COR_BRANCO);
        printf("\n");

        // --- Escolha da Coluna ---
        do {
            SetConsoleTextAttribute(h, COR_BRANCO);
            printf("Escolha a Coluna Inicial (A-J): ");

            if (scanf(" %9s", input) != 1) {
                while (getchar() != '\n');
                continue;
            }

            if (strlen(input) != 1) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Entrada invalida! Digite apenas uma letra.\n");
                continue;
            }

            letra_coluna = toupper(input[0]);
            coluna = letra_coluna - 'A';

            if (coluna < 0 || coluna > 9) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Valor invalido! Digite uma letra entre A e J.\n");
            } else {
                break;
            }
        } while (1);
        SetConsoleTextAttribute(h, COR_BRANCO);

        // --- Escolha da Linha ---
        do {
            SetConsoleTextAttribute(h, COR_BRANCO);
            printf("Escolha a Linha Inicial (0-9): ");

            if (scanf("%d", &linha) != 1) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Valor invalido! Digite um numero entre 0 e 9.\n");
                while (getchar() != '\n');
                linha = -1; // Força a repetição do loop
            } else if (linha < 0 || linha > 9) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Valor invalido! Digite um numero entre 0 e 9.\n");
            }
        } while (linha < 0 || linha > 9);
        SetConsoleTextAttribute(h, COR_BRANCO);

        // --- Escolha da Direção ---
        do {
            SetConsoleTextAttribute(h, COR_BRANCO);
            printf("Escolha a Direcao (0 - horizontal, 1 - vertical): ");

            if (scanf("%d", &direcao) != 1 || (direcao != 0 && direcao != 1)) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Valor invalido! Digite 0 ou 1.\n");
                while (getchar() != '\n');
                direcao = -1; // Força a repetição
            }
        } while (direcao != 0 && direcao != 1);

        SetConsoleTextAttribute(h, COR_BRANCO);

        // Verifica se o navio cabe no tabuleiro e se não sobrepõe outro
        int pode_posicionar = 1;
        if (direcao == 0) { // Horizontal
            if (coluna + navios[nav] > 10) {
                pode_posicionar = 0;
            } else {
                for (int j = 0; j < navios[nav]; j++) {
                    if (tabuleiro[linha][coluna + j] != ' ') {
                        pode_posicionar = 0;
                        break;
                    }
                }
            }
        } else { // Vertical
            if (linha + navios[nav] > 10) {
                pode_posicionar = 0;
            } else {
                for (int j = 0; j < navios[nav]; j++) {
                    if (tabuleiro[linha + j][coluna] != ' ') {
                        pode_posicionar = 0;
                        break;
                    }
                }
            }
        }

        if (!pode_posicionar) {
            SetConsoleTextAttribute(h, COR_VERMELHO);
            printf("Posicao invalida! O navio nao cabe ou sobrepoe outro. Tente novamente.\n");
            Sleep(2000);
            SetConsoleTextAttribute(h, COR_BRANCO);
            nav--; // Repete o posicionamento deste navio
            system("cls");
            continue;
        }

        // Posiciona navio no tabuleiro
        if (direcao == 0) { // Horizontal
            for (int j = 0; j < navios[nav]; j++) {
                tabuleiro[linha][coluna + j] = '*';
            }
        } else { // Vertical
            for (int j = 0; j < navios[nav]; j++) {
                tabuleiro[linha + j][coluna] = '*';
            }
        }
        system("cls");
    }

    SetConsoleTextAttribute(h, COR_BRANCO);
    printf("\nTabuleiro final de %s:\n", nome_jogador);
    mostrarMapa(tabuleiro);
    printf("\nPressione Enter para continuar...");
    getchar(); // Pausa para ver o tabuleiro
    while(getchar() != '\n'); // Limpa o buffer de entrada
    system("cls");

    SetConsoleTextAttribute(h, COR_BRANCO);
}

// Retorna 1 se acertou, 0 se errou
int atacar(char tabuleiro[10][10], char tabuleiroVisivel[10][10], int vida[], int jogador_alvo) {
    HANDLE h = GetStdHandle(STD_OUTPUT_HANDLE);
    int linha, coluna;
    char letra_coluna;
    char input[10];

    int acertou = 0;

    SetConsoleTextAttribute(h, COR_BRANCO);
    printf("Atacar!\n");

    mostrarMapa(tabuleiroVisivel);

    do {
         // --- Escolha da Coluna para Ataque ---
        do {
            SetConsoleTextAttribute(h, COR_BRANCO);
            printf("Escolha a Coluna para atacar (A-J): ");

            if (scanf(" %9s", input) != 1) {
                while (getchar() != '\n');
                continue;
            }
            if (strlen(input) != 1) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Entrada invalida! Digite apenas uma letra.\n");
                continue;
            }
            letra_coluna = toupper(input[0]);
            coluna = letra_coluna - 'A';
            if (coluna < 0 || coluna > 9) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Valor invalido! Digite uma letra entre A e J.\n");
            } else {
                break;
            }
        } while (1);

        // --- Escolha da Linha para Ataque ---
        do {
            SetConsoleTextAttribute(h, COR_BRANCO);
            printf("Escolha a Linha para atacar (0-9): ");
            if (scanf("%d", &linha) != 1) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Valor invalido! Digite um numero.\n");
                while (getchar() != '\n');
                linha = -1;
            } else if (linha < 0 || linha > 9) {
                SetConsoleTextAttribute(h, COR_VERMELHO);
                printf("Valor invalido! Digite um numero entre 0 e 9.\n");
            }
        } while (linha < 0 || linha > 9);

        if (tabuleiroVisivel[linha][coluna] != ' ') {
            SetConsoleTextAttribute(h, COR_AMARELO);
            printf("Voce ja atirou nessa posicao! Tente outra.\n");
            Sleep(1500);
        }

    } while (tabuleiroVisivel[linha][coluna] != ' ');


    if (tabuleiro[linha][coluna] == '*') {
        SetConsoleTextAttribute(h, COR_VERDE);
        printf("\nACERTOU!\n");
        tabuleiroVisivel[linha][coluna] = 'X';
        vida[jogador_alvo]--;
        acertou = 1;
    } else {
        SetConsoleTextAttribute(h, COR_VERMELHO);
        printf("\nERROU! Tiro na agua.\n");
        tabuleiroVisivel[linha][coluna] = 'O';
        acertou = 0;
    }
    return acertou;
}


int main() {
    char jogador[2][51];
    char tabuleiro1[10][10], tabuleiro2[10][10];
    char ataque1[10][10], ataque2[10][10];
    int jogador_atual;
    HANDLE h = GetStdHandle(STD_OUTPUT_HANDLE);

    SetConsoleTextAttribute(h, COR_BRANCO);
    printf("--------- Dificuldades ---------\n");
    printf("1 - ");
    SetConsoleTextAttribute(h, COR_VERDE); printf("Facil");
    SetConsoleTextAttribute(h, COR_BRANCO); printf(" (Navios: 5, Tamanhos: 10,8,6,4,2)\n\n");
    printf("2 - ");
    SetConsoleTextAttribute(h, COR_AMARELO); printf("Medio");
    SetConsoleTextAttribute(h, COR_BRANCO); printf(" (Navios: 5, Tamanhos: 8,6,4,3,2)\n\n");
    printf("3 - ");
    SetConsoleTextAttribute(h, COR_VERMELHO); printf("Dificil");
    SetConsoleTextAttribute(h, COR_BRANCO); printf("(Navios: 5, Tamanhos: 6,5,4,3,2)\n\n");
	

    // Define os navios com base na dificuldade
    int navios_facil[] = {10, 8, 6, 4, 2};
    int navios_medio[] = {8, 6, 4, 3, 2};
    int navios_dificil[] = {6, 5, 4, 3, 2};
    int *navios_escolhidos;
    int qtdNavios = 5;

   char entrada[10];
	int escolha;
	int valido = 0;

	do {
    	printf("Selecione a dificuldade (1-3): ");
    	scanf("%s", entrada);

    // Verifica se digitou número
    if (entrada[0] >= '0' && entrada[0] <= '9' && entrada[1] == '\0') {
        escolha = entrada[0] - '0'; // converte char para int

        if (escolha >= 1 && escolha <= 3) {
            valido = 1; // número válido (1, 2 ou 3)
        } else {
            printf("Opcao invalida! Digite um numero entre 1 e 3.\n\n");
        }

    } else {
        	printf("Entrada invalida! Digite apenas numeros.\n\n");
    	}

		} while (!valido);

	switch(escolha) {
    	case 1: navios_escolhidos = navios_facil; break;
    	case 2: navios_escolhidos = navios_medio; break;
    	case 3: navios_escolhidos = navios_dificil; break;
	}
	
		// Nomes dos jogadores
    printf("Nome do Jogador 1: ");
    scanf("%s", jogador[0]);
    printf("Nome do Jogador 2: ");
    scanf("%s", jogador[1]);
    system("cls");
	
    // Inicializa todos os tabuleiros com água (' ')
    for (int l = 0; l < 10; l++)
        for (int c = 0; c < 10; c++) {
            tabuleiro1[l][c] = tabuleiro2[l][c] = ' ';
            ataque1[l][c] = ataque2[l][c] = ' ';
        }

    

    // Calcula a vida total
    int somaNavios = 0;
    for (int i = 0; i < qtdNavios; i++) {
        somaNavios += navios_escolhidos[i];
    }
    int vida[2];
    vida[0] = somaNavios;
    vida[1] = somaNavios;

    // --- FASE DE POSICIONAMENTO ---
    posicionar(tabuleiro1, jogador[0], navios_escolhidos, qtdNavios);
    posicionar(tabuleiro2, jogador[1], navios_escolhidos, qtdNavios);

    // --- SORTEIO DE QUEM COMEÇA O ATAQUE ---
    srand(time(NULL));
    jogador_atual = rand() % 2;
    printf("Sorteando quem comeca a atacar");
    for (int i = 0; i < 3; i++) {
        printf(".");
        fflush(stdout);
        Sleep(700);
    }
    system("cls");
    printf("Quem inicia o ataque eh... ");
    SetConsoleTextAttribute(h, COR_AZUL);
    printf("%s!\n", jogador[jogador_atual]);
    SetConsoleTextAttribute(h, COR_BRANCO);
    Sleep(2000);
    system("cls");

    // --- LOOP PRINCIPAL DO JOGO ---
    while (vida[0] > 0 && vida[1] > 0) {
        int jogador_alvo = 1 - jogador_atual;

        SetConsoleTextAttribute(h, COR_BRANCO);
        printf("--- Vez de %s ---\n", jogador[jogador_atual]);
        printf("Vida restante: %d | Vida do oponente (%s): %d\n", vida[jogador_atual], jogador[jogador_alvo], vida[jogador_alvo]);

        // O jogador ataca até errar ou o jogo acabar
        while (vida[jogador_alvo] > 0) {
             int acertou = atacar(
                jogador_atual == 0 ? tabuleiro2 : tabuleiro1, // Tabuleiro real do alvo
                jogador_atual == 0 ? ataque1 : ataque2,      // Tabuleiro visível do atacante
                vida,
                jogador_alvo
            );

            if (acertou) {
                 if (vida[jogador_alvo] > 0) { // Verifica se o jogo não acabou
                    SetConsoleTextAttribute(h, COR_VERDE);
                    printf("%s joga novamente.\n", jogador[jogador_atual]);
                    printf("\n");
                    printf("--- Vez de %s ---\n", jogador[jogador_atual]);
                    printf("Vida restante: %d | Vida do oponente (%s): %d\n", vida[jogador_atual], jogador[jogador_alvo], vida[jogador_alvo]);
                 }
            } else {
                break; // Se errou, sai do loop e passa a vez
            }
        }

        // Troca a vez se o jogo não acabou
        if (vida[0] > 0 && vida[1] > 0) {
            jogador_atual = jogador_alvo;
            printf("Passando a vez para %s...\n", jogador[jogador_atual]);
            Sleep(1000);
            system("cls");
        }
    }

    // --- FIM DE JOGO ---
    system("cls");
    SetConsoleTextAttribute(h, COR_VERDE);
    printf("=========================\n");
    printf("      FIM DE JOGO!       \n");
    printf("=========================\n\n");
    SetConsoleTextAttribute(h, COR_AMARELO);
    printf("O vencedor eh: %s!\n\n", vida[0] > 0 ? jogador[0] : jogador[1]);

    SetConsoleTextAttribute(h, COR_BRANCO); // Reseta a cor para o padrão
    return 0;
}
