import java.util.ArrayList;
import java.util.Scanner;

public class exemplo_arraylist_2_2 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<String> nomes = new ArrayList<>();

        nomes.add("Matheus");
        nomes.add("Gabriel");
        nomes.add("Walter");

        System.out.println(nomes);

        for (int i = 0; i < nomes.size(); i++) {
            System.out.println(nomes.get(i));

        }

        scanner.close();
    }
}
