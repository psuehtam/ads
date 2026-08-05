import java.util.Scanner;

public class exercicio_7_3 {
    public static int soma(int num1, int num2){
        return num1 + num2;
    }

    public static int subtracao(int num1, int num2){
        return num1 - num2;
    }

    public static int multiplicacao(int num1, int num2){
        return num1 * num2;
    }

    public static float divisao(float num1, float num2){
        return num1 / num2;
    }
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);

        System.out.println("===== MENU =====");
        System.out.println("[1] Soma");
        System.out.println("[2] Subtracao");
        System.out.println("[3] Multiplicacao");
        System.out.println("[4] Divisao");
        System.out.println("[5] Sair");

        System.out.println("Digite uma opcão");
        int opcao = scanner.nextInt();

        if (opcao ==5 ){
            return;
        }
        System.out.println("Digite o primeiro numero: ");
        int num1 = scanner.nextInt();
        System.out.println("Digite o segundo numero: ");
        int num2 = scanner.nextInt();

        switch (opcao){
            case 1:
                System.out.println("Resultado: " + soma(num1,num2));
            break;
            case 2:
                System.out.println("Resultado: " + subtracao(num1,num2));
                break;
            case 3:
                System.out.println("Resultado: " + multiplicacao(num1,num2));
                break;
            case 4:
                System.out.println("Resultado: " + divisao(num1,num2));
                break;

            default: System.out.println("Opçao invalida");
        }

    }
}
