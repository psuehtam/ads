import java.io.File;
import java.io.FileWriter;
import java.util.ArrayList;
import java.util.Comparator;
import java.util.Scanner;

public class Consumo {

    public static double calcularConsumo(double distanciaKm, double consumoPorKm) {
        return distanciaKm / consumoPorKm;
    }

    public static double calcularCusto(double litros, double precoPorLitro) {
        return litros * precoPorLitro;
    }

    static void main(String[] args) throws Exception {
        ArrayList<Carros> lista = new ArrayList<>();
        File arquivo = new File("carros.txt");
        double distancia = 1000;

        if (arquivo.exists()) {
            Scanner leitor = new Scanner(arquivo);

            while (leitor.hasNextLine()) {
                String linha = leitor.nextLine();
                String[] partes = linha.split(";");

                if (partes.length == 3) {
                    String fabricante = partes[0].trim();
                    String modelo = partes[1].trim();
                    double consumo = Double.parseDouble(partes[2].trim());
                    lista.add(new Carros(fabricante, modelo, consumo));
                }
            }
            leitor.close();
        }

        if (lista.isEmpty()) {
            System.out.println("Nenhum dado encontrado no arquivo.");
            return;
        }
        Scanner scanner = new Scanner(System.in);
        System.out.println("Digite o preço do combustivel:");
        double precoCombustivel = scanner.nextDouble();
        scanner.close();

        lista.sort(Comparator.comparing(Carros::getFabricante).thenComparing(Carros::getModelo));

        FileWriter escritor = new FileWriter("resultado.txt");

        for (Carros carro : lista) {
            double litros = calcularConsumo(distancia, carro.getConsumo());
            double custo = calcularCusto(litros, precoCombustivel);

            String litrosFormatado = String.format("%.2f", litros);
            String custoFormatado = String.format("%.2f", custo);

            System.out.printf("%-20s %-10s -> %s litros -> R$ %s%n", carro.getFabricante(), carro.getModelo(), litrosFormatado, custoFormatado);

            escritor.write(carro.getFabricante() + ";" + carro.getModelo() + ";" + litrosFormatado + ";" + custoFormatado + "\n");
        }
        escritor.close();
    }
}