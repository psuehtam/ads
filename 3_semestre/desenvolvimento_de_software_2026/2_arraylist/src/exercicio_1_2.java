import java.util.*;

public class exercicio_1_2 {
    static void main(String[] args) {
        ArrayList<String> nomes = new ArrayList<>();

        nomes.add("Carlos");
        nomes.add("Bruno");
        nomes.add("Ana");
        nomes.add("Fernando");
        nomes.add("Diego");

        nomes.add(0, "Gustavo");
        System.out.println(nomes);

        nomes.add("Helena");
        System.out.println(nomes);

        if (nomes.contains("Fernando")){
            System.out.println("Fernando está na lista");

        } else {
            System.out.println("Fernando nao esta");
        }

        nomes.remove("Ana");
        System.out.println(nomes);

        Collections.sort(nomes);
        System.out.println(nomes);

        nomes.clear();
        System.out.println(nomes);
    }
}
