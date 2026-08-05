public class Produto {
     private String nome;
     private double preco;
     private int quantidade;

    public Produto(String nome, double preco, int quantidade) {
        this.nome = nome;
        this.preco = preco;
        this.quantidade = quantidade;
    }

    public String getNome() {
        return nome;
    }

    public double getPreco() {
        return preco;
    }

    public int getQuantidade() {
        return quantidade;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public void setPreco(double preco) {
       if (preco > 0){
            this.preco = preco;
        } else {
           System.out.println("Preço não pode ser menor que 0");
       }
    }

    public void setQuantidade(int quantidade) {
       if(quantidade > 0) {
           this.quantidade = quantidade;
       } else {
           System.out.println("Quantidade deve ser mais que 0");
       }
    }

    public double valorTotalEmEstoque(){
        return preco * quantidade;
    }

    public void adicionarEstoque(int adicionar){
        quantidade += adicionar;
    }

    public void removerEstoque(int remover){
      if (remover <= quantidade) {
          quantidade -=remover;
      } else {
          System.out.println("Estoque nao pode ficar negativo");
      }
    }
}

