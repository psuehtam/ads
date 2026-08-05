import java.util.Scanner;

public class exercicio_6_2 {
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);
        System.out.printf("Digite um numero de 0 a 9: ");
        int numero = scanner.nextInt();

        if (numero == 0){
            System.out.printf("Zero");
        } else if (numero == 1){
            System.out.printf("Um");
        } else if (numero == 2){
            System.out.printf("Dois");
        } else if (numero == 3){
            System.out.printf("Tres");
        } else if (numero == 4){
            System.out.printf("Quatro");
        } else if (numero == 5){
            System.out.printf("Cinco");
        } else if (numero == 6){
            System.out.printf("Seis");
        } else if (numero == 7){
            System.out.printf("Sete");
        } else if (numero == 8){
            System.out.printf("Oito");
        } else if (numero == 9){
            System.out.printf("Nove");
        } else {
            System.out.printf("Nao em um numero entre 0 e 9");
        }
    }

}
