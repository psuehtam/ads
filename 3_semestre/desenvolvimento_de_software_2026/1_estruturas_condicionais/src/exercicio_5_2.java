import java.util.Scanner;

public class exercicio_5_2 {
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite a quantidade de copias: ");
        int copias = scanner.nextInt();

        float valorCopias;
        if (copias <=100){
            valorCopias = copias * 0.25f;
        } else {
            valorCopias = 25f + ((copias-100)*0.20f);
        }

        System.out.println("Valor a ser pago eh de R$: "+ valorCopias);
    }
}
