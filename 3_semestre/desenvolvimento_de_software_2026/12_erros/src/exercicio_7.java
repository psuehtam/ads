import java.util.Scanner;
import java.util.InputMismatchException;

public class exercicio_7 {

    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        try {
            System.out.print("Digite o saldo: ");
            double saldo = scanner.nextDouble();

            System.out.print("Digite o valor do saque: ");
            double saque = scanner.nextDouble();

            validarSaque(saldo, saque);

            saldo -= saque;

            System.out.println("Saque realizado com sucesso.");
            System.out.println("Saldo atualizado: R$ " + saldo);

        } catch (IllegalArgumentException e) {
            System.out.println("Erro: " + e.getMessage());

        } catch (InputMismatchException e) {
            System.out.println("Erro: Digite apenas números.");

        } finally {
            scanner.close();
        }
    }

    public static void validarSaque(double saldo, double saque) {

        if (saldo < 0) {
            throw new IllegalArgumentException("O saldo não pode ser negativo.");
        }

        if (saque <= 0) {
            throw new IllegalArgumentException("O valor do saque deve ser maior que zero.");
        }

        if (saque > saldo) {
            throw new IllegalArgumentException("Você não tem saldo suficiente para este saque.");
        }
    }
}