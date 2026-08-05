#include <stdio.h>
	
void mostrarMatrizX(int tamMatriz,int matriz[tamMatriz][tamMatriz]){
	
	for(int linha = 0; linha < tamMatriz; linha++){
		for(int coluna = 0; coluna < tamMatriz; coluna++){
		int valor;
		matriz[linha][coluna] = valor;
		}
	}
	printf("Tamanho da Sua Matriz: \n");
	for(int linhaVaz = 0; linhaVaz < tamMatriz; linhaVaz++){
		for(int colunaVaz = 0; colunaVaz < tamMatriz; colunaVaz++){
			printf("[x]", matriz[linhaVaz][colunaVaz]);
		}
		printf("\n");
	}

}	
	
void valoresMatriz(int tamMatriz, int matriz[tamMatriz][tamMatriz]){
	printf("Preencha os valores: \n");
	for(int linha = 0; linha < tamMatriz; linha++){
		for(int coluna = 0; coluna < tamMatriz; coluna++){
		int valor;
		printf("Posicao = [%d][%d]: ", linha, coluna);
		scanf("%d", &valor);
		matriz[linha][coluna] = valor;
		}
	}
}
	
void mostrarMatriz(int tamMatriz,int matriz[tamMatriz][tamMatriz]){
	printf("Sua Matriz Preenchida: \n");
	for(int linhaVal = 0; linhaVal < tamMatriz; linhaVal++){
		for(int colunaVal = 0; colunaVal < tamMatriz; colunaVal++){
			printf("[%d]", matriz[linhaVal][colunaVal]);
		}
		printf("\n");
		
	}
}

int somaLinha(int tamMatriz, int matriz[tamMatriz][tamMatriz]){
	for(int linha = 0; linha < tamMatriz; linha++){
		int soma = 0;
		for(int coluna = 0; coluna < tamMatriz; coluna++){
			soma += matriz[linha][coluna];
	}
	printf("Soma da Linha %d = %d\n",linha, soma);
	return soma;
	
	}
	
}

int somaColuna(int tamMatriz, int matriz[tamMatriz][tamMatriz]){
	for(int linha = 0; linha < tamMatriz; linha++){
		int soma = 0;
		for(int coluna = 0; coluna < tamMatriz; coluna++){
			soma += matriz[coluna][linha];
	}
	printf("Soma da Coluna %d = %d\n",linha, soma);
	return soma;
	
	}
	
}

int somaDiagonal1(int tamMatriz, int matriz[tamMatriz][tamMatriz]){
	int soma = 0;
		for (int linha = 0; linha < tamMatriz; linha++) {
   		soma += matriz[linha][linha];
		}
		printf("Soma da Diagonal Principal = %d\n", soma);
		return soma;
	}

int somaDiagonal2(int tamMatriz, int matriz[tamMatriz][tamMatriz]){
	int soma = 0;
		for (int linha = 0; linha < tamMatriz; linha++) {
   		soma += matriz[linha][tamMatriz - linha - 1];
		}
		printf("Soma da Diagonal Secundaria = %d\n", soma);
		return soma;
	}


int main (){
	int tamMatriz;
	
	printf("Digite o Tamanho da matriz: ");
	scanf("%d", &tamMatriz);
	
	int matriz[tamMatriz][tamMatriz];
	
	//função pra mostrar matriz com x
	mostrarMatrizX(tamMatriz, matriz);
	
	printf("\n");
	
	//função pra colocar numeros na matriz
	valoresMatriz(tamMatriz, matriz);
	
	printf("\n");
	
	//função pra mostrar matriz preenchida
	mostrarMatriz(tamMatriz, matriz);
	
	printf("\n");
	
	//função pra mostrar soma de todas as linhas
	int linha = somaLinha(tamMatriz, matriz);
	
	printf("\n");
	
	//função pra mostrar soma de todas as colunas
	int coluna = somaColuna(tamMatriz, matriz);
	
	printf("\n");
	
	//função pra mostrar soma da diagonal 1
	int diagonal1 = somaDiagonal1(tamMatriz, matriz);
	
	printf("\n");
	
	//função pra mostrar soma da diagonal 2
	int diagonal2 = somaDiagonal2(tamMatriz, matriz);
	
	int somaTotal = linha + coluna + diagonal1 + diagonal2;
	
	if (linha == coluna && diagonal1 == diagonal2){
		printf("eh um quadrado perfeito\n");
		} else { 
		printf("Nao eh quadrado perfeito\n");
		
	}
	
	
return 0;	
}
