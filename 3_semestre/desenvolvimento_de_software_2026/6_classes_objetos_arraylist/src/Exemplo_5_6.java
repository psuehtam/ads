import java.util.ArrayList;
class Exemplo_5_6 {
    public static void main(String[] args) {
        ArrayList<Pessoa> lista = new ArrayList<>();
        /* Adiciona o objeto Pessoa ao ArrayList */
        lista.add(new Pessoa("Marcelo", 57));
        lista.add(new Pessoa("Ana", 19));
        lista.add(new Pessoa("Felipe",25));
        /* Define um nome para busca */
        String nomeBusca = "Ana";
        /* Variável removido inicialmente definida com false */
        boolean removido = false;
        /* Percorre a lista */
        for(int i = 0; i < lista.size(); i++){
            /* Compara os nome ignorando maiúsculas e minúsculas */
            if (lista.get(i).getNome().equalsIgnoreCase(nomeBusca)) {
                lista.remove(i);
                removido = true;
                System.out.println("Pessoa removida!");
            }
        }
        /* Testa se a variável removido continua false */
        if (!removido) {
            System.out.println("Nome nao encontrado!");
        }
    }
}