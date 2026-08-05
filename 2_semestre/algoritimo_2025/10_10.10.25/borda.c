#include <stdio.h>

void imprimirLinha(char c, int tamanho) {
    for (int i = 0; i < tamanho; i++)
        printf("%c", c);
    printf("\n");
}

void imprimirEspacosComBorda(char c, int largura, const char *texto) {
    int textoLen = texto ? (int)strlen(texto) : 0;
    int espacos = largura - 2 - textoLen;
    int lado = espacos / 2;

    printf("%c", c);
    for (int i = 0; i < lado; i++) printf(" ");
    if (texto) printf("%s", texto);
    for (int i = 0; i < espacos - lado; i++) printf(" ");
    printf("%c\n", c);
}

int main() {
    int largura = 79, altura = 9;

    imprimirLinha(177, largura);

    for (int j = 0; j < altura; j++)
        imprimirEspacosComBorda(177, largura, NULL);

    imprimirEspacosComBorda(177, largura, "Digite o nome do cliente:");

    for (int j = 0; j < altura; j++)
        imprimirEspacosComBorda(177, largura, NULL);

    imprimirLinha(177, largura);

    return 0;
}

