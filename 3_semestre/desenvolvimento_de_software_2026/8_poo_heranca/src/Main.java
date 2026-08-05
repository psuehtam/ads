public class Main {
    public static void main(String[] args) {
        /* Criando instancias de diferentes tipos de itens */
        Livro livro = new Livro("O cavaleiro preso na armadura", 1993, "Robert Fisher", 128);
        DVD dvd = new DVD("Matrix", 1999, "Ficcao Cientifica", 136);

        /* Chama o metodo toString() para cada item */
        System.out.println(livro);
        System.out.println(dvd);
    }
}

/* Classe base ou superclasse */
class ItemBiblioteca {
    private String titulo;
    private int anoPublicacao;

    /* Construtor */
    ItemBiblioteca(String titulo, int anoPublicacao) {
        this.titulo = titulo;
        this.anoPublicacao = anoPublicacao;
    }

    /* Getters e setters */
    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public int getAnoPublicacao() {
        return anoPublicacao;
    }

    public void setAnoPublicacao(int anoPublicacao) {
        this.anoPublicacao = anoPublicacao;
    }

    /* Metodo para mostrar detalhes do item */
    @Override
    public String toString() {
        return "Titulo: " + titulo + "\nAno de publicacao: " + anoPublicacao + "\n";
    }
}

/* Subclasse para livros */
class Livro extends ItemBiblioteca {
    private String autor;
    private int numeroPaginas;

    /* Construtor */
    Livro(String titulo, int anoPublicacao, String autor, int numeroPaginas) {
        super(titulo, anoPublicacao);
        this.autor = autor;
        this.numeroPaginas = numeroPaginas;
    }

    /* Getters e setters */
    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public int getNumPaginas() {
        return numeroPaginas;
    }

    public void setNumPaginas(int numeroPaginas) {
        this.numeroPaginas = numeroPaginas;
    }

    /* Sobrescrita do metodo toString() */
    @Override
    public String toString() {
        return "Detalhes do livro:\n" + super.toString() + "Autor: " + autor + "\nNumero de paginas: " + numeroPaginas + "\n";
    }
}

/* Subclasse para DVDs */
class DVD extends ItemBiblioteca {
    private String categoria;
    private int duracaoMinutos;

    /* Construtor */
    DVD(String titulo, int anoPublicacao, String categoria, int duracaoMinutos) {
        super(titulo, anoPublicacao);
        this.categoria = categoria;
        this.duracaoMinutos = duracaoMinutos;
    }

    /* Getters e setters */
    public String getCategoria() {
        return categoria;
    }

    public void setCategoria(String categoria) {
        this.categoria = categoria;
    }

    public int getDuracaoMinutos() {
        return duracaoMinutos;
    }

    public void setDuracaoMinutos(int duracaoMinutos) {
        this.duracaoMinutos = duracaoMinutos;
    }

    /* Sobrescrita do metodo toString() */
    @Override
    public String toString() {
        return "Detalhes do DVD:\n" + super.toString() + "Categoria: " + categoria + "\nDuracao em minutos: " + duracaoMinutos + "\n";
    }
}