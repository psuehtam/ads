import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Scanner;
public class Exemplo_9 {
    public static void main(String[] args) {
        /* Cria um Scanner para leitura de entrada do usuário */
        Scanner scanner = new Scanner(System.in);
        /* Solicita que o usuário digite uma data */
        System.out.print("Digite uma data (dd/mm/aaaa): ");
        String entrada = scanner.nextLine();
        /* Define o formato esperado da data digitada */
        DateTimeFormatter formato = DateTimeFormatter.ofPattern("dd/MM/yyyy");
        /* Converte a String para um objeto LocalDate usando o formato definido */
        LocalDate data = LocalDate.parse(entrada, formato);
        /* Exibe a data formatada no mesmo padrão de entrada */
        System.out.println("Data digitada: " + data.format(formato));
    }
}
