import java.util.Scanner;
public class exercicio_2_5 {
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
        for (int i = 0; i <5; i++){
            soma += numeros[2][i];
        }
        System.out.printf("Soma dos elementos da 3 linha da matriz: %d", soma);
        scanner.close();
    }
}