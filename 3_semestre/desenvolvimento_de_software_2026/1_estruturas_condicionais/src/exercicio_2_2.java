import java.util.Scanner;

public class exercicio_2_2 {
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite um numero:");
        int numero1 = scanner.nextInt();

        System.out.println("Digite outro numero:");
        int numero2 = scanner.nextInt();

        System.out.println("Digite outro numero:");
        int numero3 = scanner.nextInt();

        if (numero1 < numero2 && numero1 < numero3){
            System.out.println("Menor numero eh: " + numero1);

        } else if (numero2 < numero1 && numero2 < numero3){
            System.out.println("Menor numero eh: " + numero2);

        } else {
            System.out.println("Menor numero eh: " + numero3);
        }

        scanner.close();
    }
}