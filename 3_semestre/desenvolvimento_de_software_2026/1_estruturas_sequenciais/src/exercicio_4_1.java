import java.util.Scanner;

public class exercicio_4_1 {
    public static void main(String[] agrs) {
        Scanner scanner = new Scanner(System.in);

        int capacidadeTanque;
        int litrosAbastecidos;
        int quilometragemPercorrida;

        System.out.printf("Digite a capacidade do tanque: ");
        capacidadeTanque = scanner.nextInt();

        System.out.printf("Digite os litros abastecidos: ");
        litrosAbastecidos = scanner.nextInt();

        System.out.printf("Digite a quilometragem percorrida desde o último abastecimento: ");
        quilometragemPercorrida = scanner.nextInt();

        int consumoMedio;
        consumoMedio = quilometragemPercorrida / litrosAbastecidos;

        System.out.printf("a media de consumo eh:" +consumoMedio + "km/L");

        int litrosAntes;

        litrosAntes = capacidadeTanque - litrosAbastecidos;

        int autonomia;

        autonomia = consumoMedio * litrosAntes;

        System.out.printf("\na autonomia do veiculo eh de:" +autonomia + "km");

        scanner.close();
    }
}
