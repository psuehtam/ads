import java.util.Scanner;
import java.util.InputMismatchException;

public class exercicio_5 {



    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        try {
            System.out.print("Digite sua idade: ");
            int idade = scanner.nextInt();

            validarAcesso(idade);

            System.out.println("Acesso permitido.");

        } catch (IllegalArgumentException e) {
            System.out.println("Erro: " + e.getMessage());

        } catch (InputMismatchException e) {
            System.out.println("Erro: Digite apenas numeros");

        } finally {
            scanner.close();
        }
    }

    public static void validarAcesso(int idade) {
        if (idade < 0) {
            throw new IllegalArgumentException("A idade nao pode ser negativa.");
        }

        if (idade < 18) {
            throw new IllegalArgumentException("O usuario deve ter pelo menos 18 anos.");
        }


    }
}