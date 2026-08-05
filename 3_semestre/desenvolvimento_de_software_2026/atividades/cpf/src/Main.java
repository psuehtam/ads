import java.util.Scanner;

public class Main {

    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        String cpf = "00000000000";

        if (cpf.length() != 11) {
            System.out.println("CPF inválido");
            return;
        }

        boolean todosIguais = true;

        for (int i = 1; i < cpf.length(); i++) {
            if (cpf.charAt(i) != cpf.charAt(0)) {
                todosIguais = false;
                break;
            }
        }

        if (todosIguais) {
            System.out.println("CPF inválido - todos os dígitos são iguais");
            return;
        }

        int soma = 0;
        for (int i = 0; i < 9; i++) {
            soma += (cpf.charAt(i) - '0') * (10 - i);
        }

        int resto = soma % 11;
        int verificador1;

        if (11 - resto > 9) {
            verificador1 = 0;
        } else {
            verificador1 = 11 - resto;
        }

        if (verificador1 != (cpf.charAt(9) - '0')) {
            System.out.println("CPF inválido");
            return;
        }

        int soma2 = 0;

        for (int i = 0; i < 10; i++) {
            soma2 += (cpf.charAt(i) - '0') * (11 - i);
        }
        int resto2 = soma2 % 11;
        int verificador2;

        if (11 - resto2 > 9) {
            verificador2 = 0;
        } else {
            verificador2 = 11 - resto2;
        }
        if (verificador2 != (cpf.charAt(10) - '0')) {
            System.out.println("CPF inválido");
            return;
        }

        System.out.println("CPF válido!");

        scanner.close();
    }
}