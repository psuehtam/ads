import java.util.Scanner;

public class exemplo_vetor_1_4 {
    public static void main (String[] args){
        Scanner scanner = new Scanner(System.in);

        int[] numeros = new int[5];

        for (int i = 0; i < 5; i++){
            System.out.printf("Informe elemento [%d]:", i+1);
            numeros[i] = scanner.nextInt();
        }
        System.out.println("Elementos do vetor: ");
        for (int i = 0; i < 5; i++){
            System.out.printf(numeros[i] + " ");
        }
        scanner.close();
    }
}
