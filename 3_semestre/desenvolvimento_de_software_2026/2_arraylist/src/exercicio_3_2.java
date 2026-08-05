import java.util.*;

public class exercicio_3_2 {
    static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        float saldoInicial, operacao, creditos = 0, debitos = 0, cpmf, saldoFinal;


        System.out.print("Informe o saldo inicial: ");
        saldoInicial = scanner.nextFloat();

        do {
            System.out.print("operação: ");
            operacao = scanner.nextFloat();

            if (operacao > 0) {
                creditos += operacao;
            } else {
                debitos += operacao;
            }
        } while (operacao != 0);

        debitos = debitos * -1;
        cpmf = debitos * 0.004f;
        saldoFinal = saldoInicial + creditos - debitos - cpmf;

        System.out.print("------------------------\n");
        System.out.printf("Creditos.....: R$ %.2f\n", creditos);
        System.out.printf("Debitos......: R$ %.2f\n", debitos);
        System.out.printf("C.P.M.F......: R$ %.2f\n", cpmf);
        System.out.printf("Saldo........: R$ %.2f\n", saldoFinal);
        System.out.print("------------------------\n");

        scanner.close();
    }
}


