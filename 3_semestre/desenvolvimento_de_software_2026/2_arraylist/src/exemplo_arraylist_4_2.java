import java.util.*;

public class exemplo_arraylist_4_2 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<String> nomes = new ArrayList<>();

        nomes.add("Matheus");
        nomes.add("Zailda");
        nomes.add("Gabriel");
        nomes.add("Walter");
        nomes.add("Rafael");
        nomes.add("Allan");

        System.out.print("Digite um nome: ");
        String nome = scanner.next();

        if (nomes.contains(nome)){
            System.out.println("Achei");
            String busca = nome;
            int indice = nomes.indexOf(busca);
            System.out.println("Indice: " + indice);
                } else {
            System.out.println("nao esta");
        }

        System.out.println(nomes);


        scanner.close();
    }
}
