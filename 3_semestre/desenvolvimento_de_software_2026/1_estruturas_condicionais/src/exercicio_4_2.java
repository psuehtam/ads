import java.util.Scanner;

public class exercicio_4_2 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite um numero: ");
        int numero = scanner.nextInt();

        if (numero % 2 == 0) {
            System.out.println(numero + " eh divisivel por 2");
        }
        if (numero % 7 == 0) {
            System.out.println(numero + " eh divisivel por 7");
        }
        else {
            System.out.println("Seu numero nao eh divisivel por 7 e nem por 2");
        }
        scanner.close();
    }
}
