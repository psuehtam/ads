import java.util.*;

public class exercicio_2_2 {
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);
        ArrayList<Integer> numeros = new ArrayList<>();
        ArrayList<Integer> numerosPares = new ArrayList<>();
        ArrayList<Integer> numerosImpares = new ArrayList<>();

        for (int i = 0; i < 5; i++) {
            System.out.print("Digite um número: ");
            int numero = scanner.nextInt();

            numeros.add(numero);
            if (numero % 2 == 0){
                numerosPares.add(numero);
            }else {
                numerosImpares.add(numero);
            }
        }


        System.out.println("Numeros informados: " + numeros);
        System.out.println("Numeros Pares: " + numerosPares);
        System.out.println("Numeros Impares: " + numerosImpares);

        scanner.close();
    }
}
