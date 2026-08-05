import java.util.Scanner;
import java.util.InputMismatchException;

public class exercicio_6 {

    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        try {
            System.out.print("Digite nota: ");
            double nota = scanner.nextDouble();

            validarNota(nota);

            System.out.println("Nota Valida: " +
                    nota);

        } catch (IllegalArgumentException e) {
            System.out.println("Erro: " + e.getMessage());

        } catch (InputMismatchException e) {
            System.out.println("Erro: Digite apenas numeros");

        } finally {
            scanner.close();
        }
    }

    public static void validarNota(double nota) {
        if (nota < 0) {
            throw new IllegalArgumentException("A nota nao pode ser negativa.");
        }

        if (nota > 10) {
            throw new IllegalArgumentException("A nota não pode ser maior que 10.0.");
        }


    }
}