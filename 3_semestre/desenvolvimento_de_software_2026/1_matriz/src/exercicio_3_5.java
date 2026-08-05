import java.util.Scanner;
public class exercicio_3_5 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int[][] numeros = new int[5][5];
        int soma = 0;

        for(int i = 0; i < 5; i++) {
            for(int j = 0; j < 5; j++) {
                System.out.printf("Informe elemento [%d] [%d]: ", i+1, j+1);
                numeros[i][j] = scanner.nextInt();
            }
        }

        System.out.println("Elementos da matriz\n");
        for(int i = 0; i < 5; i++) {
            for(int j = 0; j < 5; j++) {
                System.out.printf(" [%d]", numeros[i][j]);

            }
            System.out.println();
        }

        int maior = numeros[0][0];
        int menor = numeros[0][0];

        for(int i =0; i <5; i++){
            for (int j = 0; j < 5; j++) {
                soma += numeros[i][j];

                if (numeros[i][j]> maior){
                    maior = numeros[i][j];
                }
                if (numeros [i][j] < menor){
                    menor = numeros[i][j];
                }

            }
        }
        double media = (double) soma / (numeros.length * numeros[0].length);

        System.out.println("\nMaior valor: " + maior);
        System.out.println("Menor valor: " + menor);
        System.out.println("Soma dos valores: " + soma);
        System.out.println("Media dos valores: " + media);
        scanner.close();
    }
}