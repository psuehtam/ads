import java.util.InputMismatchException;
import java.util.Scanner;

public class exercicio_2 {

    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        try {
            System.out.print("Digite um número: ");
            int numero = scanner.nextInt();

            System.out.println("Número digitado: " + numero);

        } catch (InputMismatchException e) {
            System.out.println("Erro: você digitou letras ou um valor inválido. Digite apenas números inteiros.");

        }
    }
}