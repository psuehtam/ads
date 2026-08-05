import java.util.ArrayList;
import java.util.Scanner;
import java.util.Collections;

public class exemplo_arraylist_3_2 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<String> nomes = new ArrayList<>();

        nomes.add("Matheus");
        nomes.add("Zailda");
        nomes.add("Gabriel");
        nomes.add("Walter");
        nomes.add("Rafael");
        nomes.add("Allan");

        Collections.sort(nomes);

        System.out.println(nomes);

        for (int i = 0; i < nomes.size(); i++) {
            System.out.println(nomes.get(i));

        }

        scanner.close();
    }
}
