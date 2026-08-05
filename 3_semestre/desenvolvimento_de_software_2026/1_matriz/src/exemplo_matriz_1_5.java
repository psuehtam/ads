import java.util.Scanner;

public class exemplo_matriz_1_5 {
    public static void main (String[] args){
        Scanner scanner = new Scanner(System.in);

        int [][] numeros = new int[2][3];

        for (int i = 0; i < 2;i++){
            for (int j = 0; j <3; j++){
                System.out.printf("Informe elemento [%d] [%d]: ", i, j);
                numeros[i][j] = scanner.nextInt();
            }
        }
        System.out.printf("Elementos da matriz\n");
        for (int i = 0; i < 2;i++){
            for (int j = 0; j <3; j++){
                System.out.printf(" [%5d]", numeros[i][j]);
            }
            System.out.println();
        }
        scanner.close();
    }
}
