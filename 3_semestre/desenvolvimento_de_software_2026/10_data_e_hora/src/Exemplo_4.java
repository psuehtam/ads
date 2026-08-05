import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
public class Exemplo_4 {
    public static void main(String[] args) {
        /* Obtém o horário atual do sistema (hora, minuto e segundo) */
        LocalTime agora = LocalTime.now();
        /* Define o formato de saída do horário */
        /* HH = hora (24h), mm = minutos, ss = segundos */
        DateTimeFormatter formato = DateTimeFormatter.ofPattern("HH:mm:ss");
        /* Formata o horário e exibe no console */
        System.out.println("Agora: " + agora.format(formato));
    }
}