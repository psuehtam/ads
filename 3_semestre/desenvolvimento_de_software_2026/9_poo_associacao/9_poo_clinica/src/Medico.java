public class Medico extends Pessoa{
    private String especialidade;
    private int crm;

    public Medico(String nome, int idade, String especialidade, int crm) {
        super(nome, idade);
        this.especialidade = especialidade;
        this.crm = crm;
    }

    public String getEspecialidade() {
        return especialidade;
    }

    public void setEspecialidade(String especialidade) {
        this.especialidade = especialidade;
    }

    public int getCrm() {
        return crm;
    }

    public void setCrm(int crm) {
        this.crm = crm;
    }

    @Override
    public String toString() {
        return "Dr.:" + getNome() + "-" + "Especialidade: " + especialidade + ", CRM: (" + crm + ")";
    }

}
