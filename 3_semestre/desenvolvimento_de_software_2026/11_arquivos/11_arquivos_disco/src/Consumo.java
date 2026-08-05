import java.io.File;
import java.util.Comparator;
import java.util.Scanner;
import java.util.ArrayList;

public class Consumo {

    public static void main(String[] args) throws Exception {

        ArrayList<Usuario> lista = new ArrayList<>();
        File arquivo = new File("consumo.txt");

        if (arquivo.exists()) {
            Scanner leitor = new Scanner(arquivo);

            while (leitor.hasNextLine()) {
                String linha = leitor.nextLine();
                String[] partes = linha.split(";");

                if (partes.length == 2) {
                    String nome = partes[0].trim();
                    double bytes = Double.parseDouble(partes[1].trim());

                    lista.add(new Usuario(nome, bytes));
                }
            }
            leitor.close();
        }

        if (lista.isEmpty()) {
            System.out.println("Nenhum dado cadastrado ou arquivo não encontrado.");
            return;
        }

        double totalBytes = 0.0;

        for (Usuario usuario : lista) {
            totalBytes += usuario.getBytes();
        }

        double totalMB = (totalBytes / 1024.0) / 1024.0;

        int totalUsuarios = lista.size();

        double mediaMB = totalMB / totalUsuarios;

        System.out.printf("%-4s | %-20s | %-18s | %-10s\n", "Nº", "Usuário", "Espaço utilizado", "% de uso");

        int num = 1;
        lista.sort(Comparator.comparing(Usuario::getNome));

        for (Usuario usuario : lista) {

            double espacoUsuarioMB = (usuario.getBytes() / 1024.0) / 1024.0;

            String espacoTexto = String.format("%.2f MB", espacoUsuarioMB);

            double porcentagem = (usuario.getBytes() / totalBytes) * 100.0;

            System.out.printf("%-4d | %-20s | %-18s | %-10.2f\n", num, usuario.getNome(), espacoTexto, porcentagem);

            num++;
        }

        System.out.println();
        System.out.printf("Espaço total ocupado: %.2f MB\n", totalMB);
        System.out.printf("Espaço médio ocupado: %.2f MB\n", mediaMB);
    }
}
