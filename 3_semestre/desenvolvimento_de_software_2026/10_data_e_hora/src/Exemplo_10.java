import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.Scanner;
public class Exemplo_10 {
    public static void main(String[] args) {
        /* Cria um Scanner para leitura de entrada do usuário */
        Scanner scanner = new Scanner(System.in);
        /* Solicita a hora no formato hh:mm */
        System.out.print("Digite a hora (hh:mm): ");
        String entrada = scanner.nextLine();
        /* Define o formato esperado da hora */
        DateTimeFormatter formato = DateTimeFormatter.ofPattern("HH:mm");
        /* Converte a String para um objeto LocalTime */
        LocalTime hora = LocalTime.parse(entrada, formato);
        /* Exibe a hora formatada no mesmo padrão de entrada */
        System.out.println("Hora digitada: " + hora.format(formato));
    }
}