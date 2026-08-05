import java.util.Scanner;

public class exercicio_1_4 {
    public static void main (String[] args){
        Scanner scanner = new Scanner(System.in);

        int[] numeros = new int[5];
        for (int i = 0; i < numeros.length; i++){
            System.out.printf("Informe informe um numero: ");
            numeros[i] = scanner.nextInt();
        }

        System.out.printf("Numerso inversos: ");
        for (int i = numeros.length; i >0; i--){
            System.out.printf("%d", i);

        }


    }
}
