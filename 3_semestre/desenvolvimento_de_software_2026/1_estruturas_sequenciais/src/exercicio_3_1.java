import java.util.Scanner;
public class exercicio_3_1 {
    public static void main(String[] agrs){
        Scanner scanner = new Scanner(System.in);
        int garrafa350;
        int garrafa600;
        int garrafa2;

        System.out.println("Quantidade de garrafas de 350ml:");
        garrafa350 = scanner.nextInt();

        System.out.println("Quantidade de garrafas de 600ml:");
        garrafa600 = scanner.nextInt();

        System.out.println("Quantidade de garrafas de 2L:");
        garrafa2 = scanner.nextInt();

        int totalMl = (garrafa2*2000) + (garrafa600*600) + (garrafa350*350);

        double totalLitros = totalMl / 1000.0;

        System.out.printf("Total em litros: %.2f", totalLitros);

        scanner.close();
    }
}
