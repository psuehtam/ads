public class Pessoa {
    private String nome;
    private int idade;
    private String cpf;

    Pessoa(String nome, int idade, String cpf) {
        this.nome = nome;
        this.idade = idade;
        this.cpf = cpf;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public int getIdade() {
        return idade;
    }

    public void setIdade(int idade) {
        if (idade >= 0) {
            this.idade = idade;
        }
    }

    public String getCpf() {
        return cpf;
    }

    public void setCpf(String cpf) {
        this.cpf = cpf;
    }

    public void apresentar() {
        System.out.println("Olá! Meu nome é " + this.nome + " e tenho " + this.idade + " anos de idade, e meu cpf é: " + this.cpf);

    }
}
