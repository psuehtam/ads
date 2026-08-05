#include <stdio.h>
#include <stdlib.h>

int main(){
	int menu;
	printf("==================MENU==================\n");
	printf("1 - Contagem Simples\n");
	printf("2 - Soma dos Numeros de 1 a n\n");
	printf("3 - Tabuada\n");
	printf("4 - Numeros Pares de 1 a n\n");
	printf("5 - Triangulo de Numeros\n");
	printf("6 - Triangulo invertido de numeros\n");
	printf("7 - Piramide de Numeros Pares\n");
	printf("8 - Controle de Estoque no Supermercado\n");
	printf("9 - Controle de Revisao de Carros\n");
	printf("10 - Triangulo de asteriscos ***\n");
	printf("========================================\n");
	printf("Sua Opcao: ");
	scanf("%d", &menu);
	system("cls");
	
	switch (menu){
		case 1: {
			int nmrsimples;
			printf("digite ate qual numero vc quer q conte: \n");
			scanf("%d", &nmrsimples);
			for(int i = 0; i < nmrsimples; i++){
				printf("%d\n", i+1);
			}
			break;	
		}
		case 2:{
			int numeron, soman =0;
			printf("digite ate qual numero vc quer q ele some: \n");
			scanf("%d", &numeron);
			for(int i = 0; i <=numeron; i++){
				soman += i;	
			}
			printf("%d", soman);
			break;
		}
		case 3:{
			int idctab;
			printf("digite o numero da tabuada vc quer: \n");
			scanf("%d", &idctab);
			for(int i = 0; i <=10; i++){
				printf("%d x %d = %d\n", idctab, i, (idctab*i));
			}
			break;
		}
		case 4:{
			int nmrpar, par;
			printf("digite ate qual numero vc quer q mostre os pares: \n");
			scanf("%d", &nmrpar);
			for(int i = 1; i <=nmrpar; i++){
				par = i % 2;
				if(par == 0){
					printf("%d ", i);
				}
			}
			break;
		}
		case 5:{
			int triangulo;
			printf("digite altura do triangulo: ");
			scanf("%d", &triangulo);
			for(int i = 1; i <= triangulo; i++){
				for(int j = 1; j <= i; j++){ //aqui ele para se 1 for menor que a quantidade de linhas q o cara falo, dps o i vai aumentar ent vai aumentando
					printf("%d ", j);
						}
					printf("\n");	
				}
			break;
		}
		case 6:{
			int trianguloInv;
			printf("digite altura do triangulo: ");
			scanf("%d", &trianguloInv);
			
			for(int i = trianguloInv; i >= 1 ;i--){//aqui começa com a base do valor que cooquei e toda vez  q quebra linha ele diminui 1, ai faz aquele esqm com a coluna
				
				for(int j = 1; j <= i ;j++){
					
					printf("%d", j);	
						}
					printf("\n");
				}
			break;
		}
		case 7:{
			int triangulopar;
			printf("digite altura do triangulo: ");
			scanf("%d", &triangulopar);
			
			int num=2;

			for(int i = 1; i <= triangulopar; i++){
				printf("Linha: %d   ",i);
				for(int j = 1; j <= i; j++){
					printf("%d ", num);
						num = num+2;
							}
						printf("\n");	
					}
			break;
		}
		case 8:{
			
			int qtdCadastro;
			
			printf("Digite a quantidade de produtos para cadastro: ");
			scanf("%d", &qtdCadastro);
			
			char nomeProduto[qtdCadastro][50];
			int qtdProduto[qtdCadastro];
			int qtdMinima[qtdCadastro];
			
			for(int nmrProduto = 0; nmrProduto < qtdCadastro; nmrProduto++){
				printf("\nProduto %d:\n",nmrProduto+1);
				
				printf("Nome do Produto: ");
				scanf("%s", nomeProduto[nmrProduto]);
				
				printf("Quantidade em estoque: ");
				scanf("%d", &qtdProduto[nmrProduto]);
				
				printf("Estoque minimo recomendado: ");
				scanf("%d", &qtdMinima[nmrProduto]);
				
				if(qtdMinima[nmrProduto] > qtdProduto[nmrProduto]){
					printf("O produto '%s' precisa ser reposto! (Estoque: %d, Minimo: %d)\n",nomeProduto[nmrProduto],qtdProduto[nmrProduto],qtdMinima[nmrProduto]);
				} else {
					printf("O produto '%s' tem estoque suficiente. (Estoque: %d, Minimo: %d)\n",nomeProduto[nmrProduto],qtdProduto[nmrProduto],qtdMinima[nmrProduto]);
					}
				}
			break;
		}
		case 9:{
			int qtdRegistro;
			
			printf("Digite a quantidade de Carros para registro: ");
			scanf("%d", &qtdRegistro);
			
			char nomeCarro[qtdRegistro][50];
			int anoCarro[qtdRegistro];
			int funcionamento[qtdRegistro];
			
			for(int nmrCarro = 0; nmrCarro < qtdRegistro; nmrCarro++){
				printf("\nCarro %d\n",nmrCarro+1);
				
				printf("Nome do Carro: ");
				scanf("%s", nomeCarro[nmrCarro]);
				
				printf("Ano do carro: ");
				scanf("%d", &anoCarro[nmrCarro]);
				
				printf("Funcionando normalmente? (1 - Sim | 0 - Nao): ");
				scanf("%d", &funcionamento[nmrCarro]);
				
				if(anoCarro[nmrCarro] < 2005 && funcionamento[nmrCarro] == 0){
					printf("O Carro '%s' precisa de REPAROS URGENTES!\n",nomeCarro[nmrCarro]);
					
				} else if (anoCarro[nmrCarro] < 2005 && funcionamento[nmrCarro] == 1){
					printf("O Carro '%s' eh antigo, recomenda-se uma revisao!\n",nomeCarro[nmrCarro]);
					
				} else if (anoCarro[nmrCarro] >= 2005 && funcionamento[nmrCarro] == 0){
					printf("O Carro '%s' precisa de manutencao!\n",nomeCarro[nmrCarro]);
					
				} else {
					printf("O Carro '%s' esta em boas condicaes!\n",nomeCarro[nmrCarro]);
				}
			}
			break;
		}
		case 10:{
			int linha;
			
			printf("qual tamanho da piramide?: ");
			scanf("%d", &linha)
			
			for(int i = 1; i < linha, i++){
				for
			}
			
			
			
			break;
		}
		
	}//fim menu
	
	return 0;
} 
