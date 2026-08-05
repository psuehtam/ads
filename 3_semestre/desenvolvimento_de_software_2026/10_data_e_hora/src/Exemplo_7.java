import java.time.LocalDate;
import java.time.temporal.ChronoUnit;
public class Exemplo_7 {
    public static void main(String[] args) {
        /* Define a data inicial */
        LocalDate inicio = LocalDate.of(2020, 1, 1);
        /* Define a data final */
        LocalDate fim = LocalDate.of(2026, 4, 24);
        /* Calcula a diferença total em dias entre as duas datas */
        long dias = ChronoUnit.DAYS.between(inicio, fim);
        /* Exibe o resultado no console */
        System.out.println("Total de dias: " + dias);
    }
}