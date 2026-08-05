import java.time.LocalDate;
import java.time.Period;
public class Exemplo_6 {
    public static void main(String[] args) {
        /* Define a data inicial */
        LocalDate inicio = LocalDate.of(2020, 1, 1);
        /* Define a data final */
        LocalDate fim = LocalDate.of(2026, 4, 24);
        /* Calcula a diferença entre as duas datas em anos, meses e dias */
        Period diferenca = Period.between(inicio, fim);
        /* Exibe o resultado separado em anos, meses e dias */
        System.out.println(
                diferenca.getYears() + " anos, " +
                        diferenca.getMonths() + " meses e " +
                        diferenca.getDays() + " dias."
        );
    }
}