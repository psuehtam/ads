public class Usuario {
    private String nome;
    private double bytes;

    public Usuario(String nome, double bytes) {
        this.nome = nome;
        this.bytes = bytes;
    }

    public double getBytes() {
        return bytes;
    }

    public void setBytes(double bytes) {
        this.bytes = bytes;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }
}

