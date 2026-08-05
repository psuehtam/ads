import java.util.InputMismatchException;
import java.util.Scanner;

public class exercicio_4 {

    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        int[] vetor = {1,2,3,4,5};
        int posicao;

        try {
            System.out.print("Digite uma posição do vetor: ");
            posicao = scanner.nextInt();

            System.out.println("Número da posicão: " + vetor[posicao]);

        } catch (InputMismatchException e) {
            System.out.println("Erro: você digitou letras ou um valor inválido. Digite apenas números inteiros.");

        } catch (ArrayIndexOutOfBoundsException e){
            System.out.println("Erro: você digitou uma posição que não existe, max 4.");
        }

        finally {
            scanner.close();
            System.out.println("Consulta finalizada.");
        }
    }
}