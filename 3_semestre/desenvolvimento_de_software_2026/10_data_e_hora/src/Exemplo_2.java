import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
public class Exemplo_2 {
    public static void main(String[] args) {
        /* Obtém a data atual do sistema (ano, mês e dia) */
        LocalDate hoje = LocalDate.now();
        /* Define o formato desejado para exibição da data */
        /* dd = dia, MM = mês, yyyy = ano */
        DateTimeFormatter formato = DateTimeFormatter.ofPattern("dd/MM/yyyy");
        /* Formata a data e exibe no console */
        System.out.println("Hoje: " + hoje.format(formato));
    }
}