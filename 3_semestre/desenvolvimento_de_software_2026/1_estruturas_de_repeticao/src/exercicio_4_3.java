import java.util.Scanner;

public class exercicio_4_3 {
    public static void main (String[] args){
        Scanner scanner = new Scanner(System.in);

        int num;
        int total = 0;
       do {
           System.out.printf("Digite um numero: ");
           num = scanner.nextInt();
           total += num;
       } while (num != 0);

       System.out.println(total);






        scanner.close();
    }
}
