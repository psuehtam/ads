import java.util.Scanner;

public class exemplo_vetor_2_4 {
    public static void main (String[] args){
        Scanner scanner = new Scanner(System.in);

        int[] numeros = {00,01,02,03,04,05,06,07};

        System.out.println("Elementos do vetor: ");
        for (int i : numeros){
            System.out.printf(numeros[i] + " ");
        }

        System.out.printf("\nQuantidade de vetores: %d", numeros.length);
        scanner.close();
    }
}
