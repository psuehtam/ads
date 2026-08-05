public class Main{
    public static void main(String[] args) throws Exception {
        Produto p1 = new Produto("Notebook", 2500.0, 10);

        System.out.println("Produto: " + p1.getNome());
        System.out.println("Preco: " + p1.getPreco());
        System.out.println("Quantidade: " + p1.getQuantidade());
        System.out.println("Valor total: " + p1.valorTotalEmEstoque());

        p1.adicionarEstoque(5);
        p1.removerEstoque(16);

        System.out.println("Quantidade atual: " + p1.getQuantidade());
    }
}