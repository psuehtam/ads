import java.util.ArrayList;
import java.util.Scanner;

public class exemplo_arraylist_1_2 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<String> nomes = new ArrayList<>();

        nomes.add("Matheus");
        nomes.add("Gabriel");
        nomes.add("Walter");

        System.out.println(nomes);

        System.out.print("Informe o nome: ");
        String novoNome = scanner.next();

        System.out.print("Subistituir em : ");
        int posicao = scanner.nextInt();

        nomes.set(posicao, novoNome);
        System.out.println(nomes);

        System.out.println("Tamanho da lista " + nomes.size());


        scanner.close();
    }
}
