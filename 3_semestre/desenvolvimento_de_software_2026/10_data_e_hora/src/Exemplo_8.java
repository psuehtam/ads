import java.time.LocalTime;
import java.time.Duration;
public class Exemplo_8 {
    public static void main(String[] args) {
        /* Define o horário de início */
        LocalTime inicio = LocalTime.of(8, 30);
        /* Define o horário de fim */
        LocalTime fim = LocalTime.of(12, 45);
        /* Calcula a duração entre os dois horários */
        Duration diferenca = Duration.between(inicio, fim);
        /* Converte a duração total em horas inteiras */
        long horas = diferenca.toHours();
/* Converte a duração total em minutos e pega apenas o restante após remover as
horas completas */
        long minutos = diferenca.toMinutes() % 60;
        /* Exibe o resultado formatado no console */
        System.out.println("Diferenca: " + horas + "h " + minutos + "min");
    }
}