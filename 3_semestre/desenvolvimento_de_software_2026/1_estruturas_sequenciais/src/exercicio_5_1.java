import java.util.Scanner;

public class exercicio_5_1 {
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);

        int saque;

        System.out.printf("Digite o valor de saque: ");
        saque = scanner.nextInt();

        int notas100 = saque/100;
        int resto = saque%100;

        int notas50 = resto/50;
        resto %= 50;

        int notas20 = resto/20;
        resto %= 20;

        int notas10 = resto/10;
        resto %= 10;

        int notas5 = resto/5;
        resto %= 5;

        System.out.printf(notas100 + " notas de 100\n");
        System.out.printf(notas50 + " notas de 50\n");
        System.out.printf(notas20 + " notas de 20\n");
        System.out.printf(notas10 + " notas de 10\n");
        System.out.printf(notas5 + " notas de 5\n");

        if (resto>0){
            System.out.printf("Sobrou " + resto + " Real (valor nao sacavel)");
        }


        scanner.close();
    }
}
