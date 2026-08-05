import java.time.ZonedDateTime;
import java.time.ZoneId;
import java.time.format.DateTimeFormatter;

public class Teste_1 {
    static void main(String[] args) throws InterruptedException {

        ZoneId brasilia = ZoneId.of("America/Sao_Paulo");
        DateTimeFormatter formato = DateTimeFormatter.ofPattern("HH:mm:ss");

        int hora = 1;
        while (hora == 1) {
            ZonedDateTime agora = ZonedDateTime.now(brasilia);

            System.out.printf("\rAgora (Brasilia): " + agora.format(formato));

            Thread.sleep(1000);
        }
    }
}