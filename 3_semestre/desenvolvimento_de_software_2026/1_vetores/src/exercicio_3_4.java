import java.util.Scanner;

public class exercicio_3_4 {
    static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        int[] numeros = {10, 20, 30, 40, 50};
        int num;
        boolean encontrado = false;

        System.out.print("Digite um numero:");
        num = scanner.nextInt();
        for (int i = 0; i < numeros.length; i++) {

            if (numeros[i] == num) {
                System.out.printf("Elemento encontrado no indice [%d]", i);
                System.exit(0);
            }
        }

        System.out.print("Elemento não encontrado");

    }
}

