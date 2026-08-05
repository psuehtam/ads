class Pessoa{
    private String nome;
    private int idade;
    public void setNome(String nome){
        this.nome = nome;
    }
    public void setIdade(int idade){
        this.idade = idade;
    }
    public String getNome(){
        return nome;
    }
    public int getIdade(){
        return idade;
    }
    public void fazerAniversario(){
        this.idade++;
    }
    @Override
    public String toString(){
        return "Nome: " + nome + ", Idade: " + idade;
    }
}