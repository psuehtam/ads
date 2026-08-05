import java.util.Scanner;

public class exercicio_2_1 {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int numeroInt;
        System.out.println("Digite um numero inteiro:");
        numeroInt = scanner.nextInt();


        int numeroAntecessor = (numeroInt - 1);
        int numeroSucessor = (numeroInt + 1);
        System.out.println("numero antecessor:" + numeroAntecessor);
        System.out.println("seu numero:" + numeroInt);
        System.out.println("numero sucessor:" + numeroSucessor);

        scanner.close();
    }
}
