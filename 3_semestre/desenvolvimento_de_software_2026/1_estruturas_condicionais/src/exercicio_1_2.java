import java.util.Scanner;

public class exercicio_1_2 {
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite um numero inteiro: ");
        int numero1 = scanner.nextInt();

        System.out.println("Digite outro numero inteiro: ");
        int numero2 = scanner.nextInt();

        if (numero1 > numero2){
            System.out.println(numero2 + numero1);
        } else
            System.out.println(numero1 + numero2);

        scanner.close();
    }
}
