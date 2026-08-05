public class Paciente extends Pessoa{
    private String enfermidade;

    public Paciente(String nome, int idade, String enfermidade){
        super(nome, idade);
        this.enfermidade = enfermidade;
    }

    public String getEnfermidade() {
        return enfermidade;
    }

    public void setEnfermidade(String enfermidade) {
        this.enfermidade = enfermidade;
    }

    @Override
    public String toString() {
        return "Paciente:" + getNome() + "-" + "Enfermidade: " + enfermidade;
    }
}
