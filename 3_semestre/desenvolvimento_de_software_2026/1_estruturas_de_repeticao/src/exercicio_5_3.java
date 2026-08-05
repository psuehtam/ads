import java.util.Scanner;

public class exercicio_5_3 {
    public static void main (String[] args){
        Scanner scanner = new Scanner(System.in);

        int num;
        System.out.printf("Digite um numero: ");
        num = scanner.nextInt();

        for (int i =1; i<=10;i++){
            System.out.println(num + " x " + i + " = " + num*i);
        }
    }
}
