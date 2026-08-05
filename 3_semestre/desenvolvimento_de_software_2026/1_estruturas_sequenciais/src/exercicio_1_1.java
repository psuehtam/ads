import java.util.Scanner;

public class exercicio_1_1 {
    public static void main(String[] args) {
        int horas;
        int minutos;
        int segundos;

        Scanner scanner = new Scanner(System.in);

        System.out.print("digite as horas: ");
        horas = scanner.nextInt();

        System.out.print("\ndigite os minutos: ");
        minutos = scanner.nextInt();

        System.out.print("\ndigite os segundos: ");
        segundos = scanner.nextInt();

        int totalSegundos = (horas * 3600) + (minutos * 60) + segundos;
        System.out.print("\nTotal em segundos:" + totalSegundos);

        scanner.close();
    }
}