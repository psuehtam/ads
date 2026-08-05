class Emprestimo {
    private Cliente cliente;
    private Livro livro;
    private String data;

    public Cliente getCliente() {
        return cliente;
    }
    public Livro getLivro() {
        return livro;
    }
    public String getDataEmprestimo() {
        return data;
    }

    public Emprestimo(Cliente cliente, Livro livro, String data) {
        this.cliente = cliente;
        this.livro = livro;
        this.data = data;


    }


    @Override
    public String toString() {
        return "=====Emprestimo=====\n" +
                "Cliente= " + cliente+
                "\nLivro= " + livro +
                "\nData= " + data;
    }
}