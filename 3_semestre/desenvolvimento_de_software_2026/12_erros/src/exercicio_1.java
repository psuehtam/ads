import java.util.InputMismatchException;
import java.util.Scanner;
public class exercicio_1 {

    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        try {
            System.out.print("Digite o primeiro numero: ");
            int numero1 = scanner.nextInt();

            System.out.print("Digite o segundo numero: ");
            int numero2 = scanner.nextInt();

            int resultado = numero1 / numero2;
            System.out.println("Resultado: " + resultado);

        } catch (InputMismatchException e) {
            System.out.println("Erro: digite apenas numeros inteiros.");

        } catch (ArithmeticException e) {
            System.out.println("Erro: Nao e possível dividir por zero.");

        } finally {
            scanner.close();
            System.out.println("Programa encerrado.");
        }
    }
}
