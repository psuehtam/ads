public class Exemplo{
    public static void main(String[] args) {
        /* Criando um cliente */
        Cliente cliente1 = new Cliente("Joao", "joao@exemplo.com", "Rua A, 123");
        /* Criando um pedido associado ao cliente */
        Pedido pedido1 = new Pedido(1, 210.75, cliente1);
        /* Imprimindo os detalhes do pedido */
        pedido1.imprimirDetalhes();
    }
}