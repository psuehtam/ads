import java.io.File;
import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static void main(String[] args) throws Exception {
        ArrayList<Temperatura> lista = new ArrayList<>();
        File arquivo = new File("temperatura.txt");

        if (arquivo.exists()) {
            Scanner leitor = new Scanner(arquivo);
            while (leitor.hasNextLine()) {
                String linha = leitor.nextLine();
                String[] partes = linha.split(";");
                if (partes.length == 2) {
                    String nome = partes[0].trim();
                    double temperatura = Double.parseDouble(partes[1].trim());
                    lista.add(new Temperatura(nome, temperatura));
                }
            }
            leitor.close();
        }

        double totalTemp = 0.0;
        for (Temperatura temperatura : lista) {
            totalTemp += temperatura.getTemperatura();
        }
        int qtdMes = lista.size();
        double mediaTemp = totalTemp / qtdMes;
        String mediaFormatado = String.format("%.2f ºC", mediaTemp);

        Temperatura maior = lista.get(0);
        Temperatura menor = lista.get(0);
        for (Temperatura temperatura : lista) {
            if (temperatura.getTemperatura() > maior.getTemperatura()) maior = temperatura;
            if (temperatura.getTemperatura() < menor.getTemperatura()) menor = temperatura;
        }

        if (lista.isEmpty()) {
            System.out.println("Nenhum dado cadastrado ou arquivo não encontrado.");
        }
        System.out.println("------------------------------------------");
        System.out.printf("%-15s | %-12s | %-15s\n", "Mês", "Temperatura", "Diferença");
        System.out.println("------------------------------------------");
        for (Temperatura temperatura : lista) {
            String tempFormatado = String.format("%.2f ºC", temperatura.getTemperatura());
            String difFormatado = String.format("%+.2f ºC", temperatura.getTemperatura() - mediaTemp);
            System.out.printf("%-15s | %-12s | %9s\n", temperatura.getNome(), tempFormatado, difFormatado);
        }
        System.out.println("------------------------------------------");
        System.out.printf(mediaFormatado);

        System.out.println("Maior temperatura:");
        System.out.println(maior.getNome() + " = " + maior.getTemperatura());
        System.out.println("Menor temperatura:");
        System.out.println(menor.getNome() + " = " + menor.getTemperatura());
    }
}