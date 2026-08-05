//1 - Escreva um programa que dado o saldo inicial e uma série de operações de crédito/débito
// (identificadas com valores positivos ou negativos e finalizada com zero),
// informe o total de créditos, o total de débitos, a C.P.M.F. paga (0,40% do total de débitos)
// e o saldo final da conta, baseado no seguinte exemplo:
//Saldo inicial: 1000.00
//Operação: 200
//Operação: -50
//Operação: -10
//Operação: 170
//Operação: -500
//Operação: 0
//------------------------
//Créditos.....: R$ 370.00
//Débitos......: R$ 560.00
//C.P.M.F......: R$ 2.24
//Saldo........: R$ 807.76
//------------------------

import java.util.Scanner;

public class atividade_extra_1_3 {
    public static void  main(String[] args){
        Scanner scanner = new Scanner(System.in);

        float saldoInicial, operacao, creditos=0, debitos=0, cpmf, saldoFinal;


        System.out.printf("Informe o saldo inicial: ");
        saldoInicial = scanner.nextFloat();

        do {
            System.out.printf("operação: ");
            operacao = scanner.nextFloat();

            if (operacao >0){
                creditos += operacao;
            }
            else {
                debitos += operacao;
            }
        } while (operacao != 0);

        debitos = debitos * -1;
        cpmf = debitos * 0.004f;
        saldoFinal = saldoInicial + creditos - debitos - cpmf;

        System.out.printf("------------------------\n");
        System.out.printf("Creditos.....: R$ %.2f\n", creditos);
        System.out.printf("Debitos......: R$ %.2f\n", debitos);
        System.out.printf("C.P.M.F......: R$ %.2f\n",cpmf);
        System.out.printf("Saldo........: R$ %.2f\n",saldoFinal);
        System.out.printf("------------------------\n");

        scanner.close();


    }
}
