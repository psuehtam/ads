class Pedido {
    private int numero;
    private double valorTotal;
    private Cliente cliente; /* Relacionamento de associacao com Cliente */
    /* Construtor da classe */
    public Pedido(int numero, double valorTotal, Cliente cliente) {
        this.numero = numero;
        this.valorTotal = valorTotal;
        this.cliente = cliente;
    }
    /* Metodo para imprimir os detalhes do pedido */
    public void imprimirDetalhes() {
        System.out.println("Numero do pedido: " + numero);
        System.out.println("Valor do pedido: " + valorTotal);
        System.out.println("Cliente: " + cliente.getNome());
        System.out.println("Email do cliente: " + cliente.getEmail());
        System.out.println("Endereco de entrega: " + cliente.getEndereco());
        System.out.println();
    }
}