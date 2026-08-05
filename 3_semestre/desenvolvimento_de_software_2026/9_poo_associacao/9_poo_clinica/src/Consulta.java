public class Consulta {
    private Medico medico;
    private Paciente paciente;
    private String data;

    public Consulta(Paciente paciente, Medico medico, String data) {
        this.medico = medico;
        this.paciente = paciente;
        this.data = data;
    }

    @Override
    public String toString() {
        return "Consulta em: " + data + '\n' + medico + '\n' + paciente;
    }
}