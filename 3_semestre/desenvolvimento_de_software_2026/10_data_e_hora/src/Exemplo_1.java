import java.time.LocalDate;
public class Exemplo_1 {
    public static void main(String[] args) {
        /* Obtém a data atual do sistema (ano, mês e dia) */
        LocalDate hoje = LocalDate.now();
        /* Exibe a data no formato padrão yyyy-MM-dd */
        System.out.println("Hoje: " + hoje);
    }
}