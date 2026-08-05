public class Livro {
    private String titulo;
    private String autor;
    private int anoPublicacao;
    private int quatidadePaginas;
    private int paginasLidas = 0;
    private boolean emprestado = false;

    public Livro(String titulo, String autor, int anoPublicacao, int quatidadePaginas) {
        this.titulo = titulo;
        this.autor = autor;
        this.anoPublicacao = anoPublicacao;
        this.quatidadePaginas = quatidadePaginas;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public int getAnoPublicacao() {
        return anoPublicacao;
    }

    public void setAnoPublicacao(int anoPublicacao) {
        this.anoPublicacao = anoPublicacao;
    }

    public int getQuatidadePaginas() {
        return quatidadePaginas;
    }

    public void setQuatidadePaginas(int quatidadePaginas) {
        if (quatidadePaginas < 0) {
            System.out.print("Quantidade de paginas não pode ser negativa");
        }
        this.quatidadePaginas = quatidadePaginas;
    }

    public int getPaginasLidas() {
        return paginasLidas;
    }

    public void setPaginasLidas(int paginasLidas) {
        if (paginasLidas < 0) {
            System.out.print("Quantidade de paginas não pode ser negativa");
        }
        if (paginasLidas > quatidadePaginas) {
            System.out.print("Você não pode ler mais páginas do que o livro possui!");
        }
        this.paginasLidas = paginasLidas;
    }

    public boolean isEmprestado() {
        return emprestado;
    }

    public void setEmprestado(boolean emprestado) {
        this.emprestado = emprestado;
    }


    public void emprestarLivro() {
        if (emprestado == false) {
            emprestado = true;
        } else {
            System.out.println("Este livro já está emprestado!");
        }
    }

    public void lerPaginas(int qtd) {
        if (qtd > getQuatidadePaginas()){
            System.out.println("Não pode ler mais paginas do que o livro possui!");
            return;
        }
        paginasLidas = qtd;
    }

    public void devolverLivro(){
        emprestado = false;
        setPaginasLidas(0);
        System.out.println("Este livro já está disponível na biblioteca!");

    }

    public void mostrarStatus(){
        if (emprestado == false){
            System.out.print("O livro " + getTitulo() + " está disponivel");
        } else {
            System.out.print("O livro " + getTitulo() + " está emprestado e ja teve " + getPaginasLidas()  + " lidas de " + getQuatidadePaginas());
        }
    }

    public void calcularProgressoLeitura(){

        double progresso = (((double) getPaginasLidas() / getQuatidadePaginas()) * 100);

        String porcentagem = String.format("%.2f", progresso);
        System.out.print("O percentual de leitura do livro " + getTitulo() + " é de " + porcentagem + " %");
    }

    @Override
    public String toString() {
        return "Titulo: " + getTitulo()+"\n"+
                "Autor: " + getAutor()+"\n"+
                "Ano: " + getAnoPublicacao()+"\n"+
                "Quatidade de Paginas: " + getQuatidadePaginas()+"\n"+
                "Paginas Lidas: " + getPaginasLidas()+"\n"+
                "Emprestado: " + emprestado+"\n";
    }
}

