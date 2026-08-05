import java.util.*;

public class exercicio_1_6 {
    static void main(String[] args) {
        ArrayList<Produto> lista = new ArrayList<>();
        lista.add(new Produto("Notebook", 1500.00));
        lista.add(new Produto("Shampoo", 99.90));
        lista.add(new Produto("Caderno", 15.98));
        lista.add(new Produto("Celular", 3050.00));
        lista.add(new Produto("Marmita", 22.00));

        lista.sort(Comparator.comparing(Produto::getNome));
        System.out.println("Ordem Crescente Nome");

        for (int i = 0; i < lista.size(); i++) {
            System.out.println("Nome:" + lista.get(i).getNome());
            System.out.println("Preço:" + lista.get(i).getPreco());
            System.out.println(" ");
        }

        lista.sort(Comparator.comparing(Produto::getPreco));
        System.out.println("Ordem Crescente Preço");
        for (int i = 0; i < lista.size(); i++) {
            System.out.println("Nome:" + lista.get(i).getNome());
            System.out.println("Preço:" + lista.get(i).getPreco());
            System.out.println(" ");
        }

        System.out.println("Preços maiores que 100:");
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getPreco() >= 100) {
                System.out.println("Nome:" + lista.get(i).getNome());
                System.out.println("Preço:" + lista.get(i).getPreco());
                System.out.println(" ");
            }

        }


        System.out.println("Busca de Produtos:");
        String busca = "Arroz";
        Boolean encontrado = false;

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNome().equalsIgnoreCase(busca)) {
                encontrado = true;
                System.out.println("Nome:" + lista.get(i).getNome());
                System.out.println("Preço:" + lista.get(i).getPreco());
                System.out.println(" ");
            }
        }
        if (!encontrado) {
            System.out.println("Produto nao encontrado");
            System.out.println(" ");
        }

        System.out.println("Exclusão de Produtos:");
        String buscaExclui = "Notebook";
        Boolean encontradoExclui = false;

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNome().equalsIgnoreCase(buscaExclui)) {
                lista.remove(i);
                encontradoExclui = true;
                System.out.println("Produto foi excluido");
                System.out.println(" ");
            }
        }
        if (!encontradoExclui) {
            System.out.println("Produto nao existe");
            System.out.println(" ");
        }



    }

}
