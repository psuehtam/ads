#include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define TOTAL_POKEMONS 6
#define MAX_ATTACKS 4
#define LEVEL 50

char tipos[5][20] = {"Fogo","Agua","Planta","Eletrico","Normal"};

double type_effectiveness(int atkType, int defType) {
    if (atkType == 0 && defType == 2) return 2.0;
    if (atkType == 1 && defType == 0) return 2.0;
    if (atkType == 2 && defType == 1) return 2.0;
    if (atkType == 3 && defType == 1) return 2.0;

    if (atkType == 2 && defType == 0) return 0.5;
    if (atkType == 0 && defType == 1) return 0.5;

    return 1.0;
}

int calculate_damage(int level, int power, int atkStat, int defStat, int moveType, int attackerType, int defenderType) {
    double stab = (moveType == attackerType) ? 1.5 : 1.0;
    double typeEff = type_effectiveness(moveType, defenderType);
    double random_factor = 0.85 + (rand() % 16) / 100.0;

    double base = (((2.0 * level) / 5.0) + 2.0) * (double)power * ((double)atkStat / (double)defStat);
    base = base / 50.0 + 2.0;

    double dmg = base * stab * typeEff * random_factor;
    int idmg = (int)(dmg + 0.5);
    if (idmg < 1) idmg = 1;
    return idmg;
}

int escolher_proximo(int escolhidos[], int morto, char nomes[][20], int vivos[]) {
    int escolha;

    printf("\nEscolha seu proximo Pokemon:\n");

    for (int i = 0; i < 3; i++) {
        if (vivos[i] && i != morto) {
            printf("%d - %s\n", i+1, nomes[escolhidos[i]]);
        }
    }

    do {
        printf("Digite o numero do Pokemon que ainda esta vivo: ");
        scanf("%d", &escolha);
        escolha--;
    } while (escolha < 0 || escolha > 2 || !vivos[escolha] || escolha == morto);

    return escolha;
}

int main() {
    srand((unsigned)time(NULL));

    int stats[TOTAL_POKEMONS][5] = {
        {0, 100, 52, 43, 65},
        {1, 110, 48, 65, 43},
        {3, 90, 55, 40, 90},
        {2, 105, 49, 49, 45},
        {4, 100, 55, 50, 55},
        {1, 100, 52, 48, 55}
    };

    char nomes[TOTAL_POKEMONS][20] = {
        "Charmander",
        "Squirtle",
        "Pikachu",
        "Bulbasaur",
        "Eevee",
        "Psyduck"
    };

    int ataques[TOTAL_POKEMONS][MAX_ATTACKS][2] = {
        { {15,0},{25,0},{35,0},{10,4} },
        { {15,4},{25,1},{20,1},{10,4} },
        { {20,4},{25,3},{35,3},{10,4} },
        { {15,4},{25,2},{35,2},{10,4} },
        { {20,4},{25,4},{25,4},{10,4} },
        { {15,4},{25,1},{30,4},{10,4} }
    };

    char atkNome[TOTAL_POKEMONS][MAX_ATTACKS][20] = {
        { "Scratch","Ember","Fire Fang","Bite" },
        { "Tackle","Water Gun","Bubble","Headbutt" },
        { "Quick Attack","ThunderShock","Electro Ball","Bite" },
        { "Tackle","Vine Whip","Razor Leaf","Headbutt" },
        { "Quick Attack","Bite","Swift","Tackle" },
        { "Scratch","Water Gun","Confusion","Headbutt" }
    };

    int escolhido1[3], escolhido2[3];
    int vivos1[3] = {1,1,1};
    int vivos2[3] = {1,1,1};

    int i, escolha;

    printf("\nJogador 1 escolha 3 pokemons:\n");
    for (i = 0; i < TOTAL_POKEMONS; i++)
        printf("%d - %s\n", i+1, nomes[i]);

    for (i = 0; i < 3; i++) {
        do {
            printf("Escolha %d: ", i+1);
            scanf("%d", &escolha);
        } while (escolha < 1 || escolha > TOTAL_POKEMONS);
        escolhido1[i] = escolha - 1;
    }

    printf("\nJogador 2 escolha 3 pokemons:\n");
    for (i = 0; i < TOTAL_POKEMONS; i++)
        printf("%d - %s\n", i+1, nomes[i]);

    for (i = 0; i < 3; i++) {
        do {
            printf("Escolha %d: ", i+1);
            scanf("%d", &escolha);
        } while (escolha < 1 || escolha > TOTAL_POKEMONS);
        escolhido2[i] = escolha - 1;
    }

    int p1 = 0, p2 = 0;
    int hp1 = stats[escolhido1[p1]][1];
    int hp2 = stats[escolhido2[p2]][1];

    while (1) {
        int poke1 = escolhido1[p1];
        int poke2 = escolhido2[p2];

        printf("\n--- Turno ---\n");
        printf("J1: %s (HP %d)\n", nomes[poke1], hp1);
        printf("J2: %s (HP %d)\n", nomes[poke2], hp2);

        int atkA, atkB;

        printf("\nAtaques do Jogador 1:\n");
        for (i = 0; i < MAX_ATTACKS; i++)
            printf("%d - %s (Power %d, Tipo %s)\n", i+1, atkNome[poke1][i], ataques[poke1][i][0], tipos[ataques[poke1][i][1]]);
        do scanf("%d",&atkA); while(atkA < 1 || atkA > 4);
        atkA--;

        printf("\nAtaques do Jogador 2:\n");
        for (i = 0; i < MAX_ATTACKS; i++)
            printf("%d - %s (Power %d, Tipo %s)\n", i+1, atkNome[poke2][i], ataques[poke2][i][0], tipos[ataques[poke2][i][1]]);
        do scanf("%d",&atkB); while(atkB < 1 || atkB > 4);
        atkB--;

        int speed1 = stats[poke1][4];
        int speed2 = stats[poke2][4];

        if (speed1 >= speed2) {
            int dmg1 = calculate_damage(LEVEL, ataques[poke1][atkA][0], stats[poke1][2], stats[poke2][3], ataques[poke1][atkA][1], stats[poke1][0], stats[poke2][0]);
            hp2 -= dmg1;
            printf("%s usou %s e causou %d!\n", nomes[poke1], atkNome[poke1][atkA], dmg1);

            if (hp2 <= 0) {
                printf("%s caiu!\n", nomes[poke2]);
                vivos2[p2] = 0;
                if (!vivos2[0] && !vivos2[1] && !vivos2[2]) break;
                p2 = escolher_proximo(escolhido2, p2, nomes, vivos2);
                hp2 = stats[escolhido2[p2]][1];
                continue;
            }

            int dmg2 = calculate_damage(LEVEL, ataques[poke2][atkB][0], stats[poke2][2], stats[poke1][3], ataques[poke2][atkB][1], stats[poke2][0], stats[poke1][0]);
            hp1 -= dmg2;
            printf("%s usou %s e causou %d!\n", nomes[poke2], atkNome[poke2][atkB], dmg2);

            if (hp1 <= 0) {
                printf("%s caiu!\n", nomes[poke1]);
                vivos1[p1] = 0;
                if (!vivos1[0] && !vivos1[1] && !vivos1[2]) break;
                p1 = escolher_proximo(escolhido1, p1, nomes, vivos1);
                hp1 = stats[escolhido1[p1]][1];
            }

        } else {
            int dmg2 = calculate_damage(LEVEL, ataques[poke2][atkB][0], stats[poke2][2], stats[poke1][3], ataques[poke2][atkB][1], stats[poke2][0], stats[poke1][0]);
            hp1 -= dmg2;
            printf("%s usou %s e causou %d!\n", nomes[poke2], atkNome[poke2][atkB], dmg2);

            if (hp1 <= 0) {
                printf("%s caiu!\n", nomes[poke1]);
                vivos1[p1] = 0;
                if (!vivos1[0] && !vivos1[1] && !vivos1[2]) break;
                p1 = escolher_proximo(escolhido1, p1, nomes, vivos1);
                hp1 = stats[escolhido1[p1]][1];
                continue;
            }

            int dmg1 = calculate_damage(LEVEL, ataques[poke1][atkA][0], stats[poke1][2], stats[poke2][3], ataques[poke1][atkA][1], stats[poke1][0], stats[poke2][0]);
            hp2 -= dmg1;
            printf("%s usou %s e causou %d!\n", nomes[poke1], atkNome[poke1][atkA], dmg1);

            if (hp2 <= 0) {
                printf("%s caiu!\n", nomes[poke2]);
                vivos2[p2] = 0;
                if (!vivos2[0] && !vivos2[1] && !vivos2[2]) break;
                p2 = escolher_proximo(escolhido2, p2, nomes, vivos2);
                hp2 = stats[escolhido2[p2]][1];
            }
        }
    }

    printf("\n=====================================\n");
    if (!vivos2[0] && !vivos2[1] && !vivos2[2])
        printf("Jogador 1 venceu!\n");
    else
        printf("Jogador 2 venceu!\n");
    printf("=====================================\n");

    return 0;
}
