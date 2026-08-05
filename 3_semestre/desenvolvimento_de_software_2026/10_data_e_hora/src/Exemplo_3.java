import java.time.LocalTime;
public class Exemplo_3 {
    public static void main(String[] args) {
        /* Obtém o horário atual do sistema (hora, minuto e segundo) */
        LocalTime agora = LocalTime.now();
        /* Exibe o horário no formato HH:mm:ss.nnn */
        System.out.println("Agora: " + agora);
    }
}