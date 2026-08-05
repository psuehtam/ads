import java.util.Scanner;
public class exercicio_2_4 {
    static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int[] numeros = new int[5];
        int soma = 0;
        for(int i = 0; i < numeros.length; i++) {
            System.out.print("Informe informe um numero: ");
            numeros[i] = scanner.nextInt();
            soma += numeros[i];
        }
        double media = (double) soma / numeros.length;
        System.out.println("Media: " + media);
        System.out.print("Numeros maiores que a media: ");
        for(int i = 0; i < numeros.length; i++) {
            if(numeros[i] >= media) {
                System.out.printf("%d ", numeros[i]);
            }
        }
    }
}