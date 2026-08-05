import java.time.ZonedDateTime;
import java.time.ZoneId;
import java.time.format.DateTimeFormatter;
public class Exemplo_5 {
    public static void main(String[] args) {
        /* Define o fuso horário de Brasília */
        ZoneId brasilia = ZoneId.of("America/Sao_Paulo");

        /* Obtém a hora atual com base no fuso definido */
        ZonedDateTime agora = ZonedDateTime.now(brasilia);

        /* Define o formato de saída (hora:minuto:segundo no padrão 24h) */
        DateTimeFormatter formato = DateTimeFormatter.ofPattern("HH:mm:ss");

        /* Formata a hora e exibe no console */
        System.out.println("Agora (Brasilia): " + agora.format(formato));
    }
}