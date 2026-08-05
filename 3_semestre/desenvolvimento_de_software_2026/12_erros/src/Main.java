public class Main {
    public static void main(String[] args) {
        int idadeUsuario = 15;

        try {
            validarAcesso(idadeUsuario);
            System.out.println("Acesso liberado!");

        } catch (IllegalArgumentException e) {
            System.out.println("Acesso negado.");
            System.out.println("Erro: " + e.getMessage());

        } finally {
            System.out.println("Sistema finalizado.");
        }
    }
    public static void validarAcesso(int idade) {
        if (idade < 0) {
            throw new IllegalArgumentException("A idade nao pode ser negativa.");
        }
        if (idade < 18) {
            throw new IllegalArgumentException("O usuario deve ter pelo menos 18 anos.");
        }
    }
}