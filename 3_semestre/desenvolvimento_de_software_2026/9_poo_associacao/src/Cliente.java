class Cliente {
    private String nome;
    private String email;
    private String endereco;
    /* Construtor da classe */
    public Cliente(String nome, String email, String endereco) {
        this.nome = nome;
        this.email = email;
        this.endereco = endereco;
    }
    /* Getters */
    public String getNome(){
        return nome;
    }
    public String getEmail(){
        return email;
    }
    public String getEndereco(){
        return endereco;
    }
}