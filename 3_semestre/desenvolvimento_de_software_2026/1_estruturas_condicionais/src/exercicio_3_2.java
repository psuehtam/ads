import java.util.Scanner;

public class exercicio_3_2 {
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite um numero: ");
        int numero = scanner.nextInt();

        if (numero % 2 == 0 && numero % 3 == 0){
            System.out.println(numero + " eh divisivel por 2 e por 3");
        } else {
            System.out.println(numero + " nao eh divisivel por 2 e por 3");
        }

        scanner.close();
    }
}