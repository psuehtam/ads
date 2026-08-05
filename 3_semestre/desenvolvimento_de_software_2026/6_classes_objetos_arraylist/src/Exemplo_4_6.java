import java.util.ArrayList;

class Exemplo_4_6 {
    static void main(String[] args) {
        ArrayList<Pessoa> lista = new ArrayList<>();
        /* Adiciona o objeto Pessoa ao ArrayList */
        lista.add(new Pessoa("Marcelo", 57));
        lista.add(new Pessoa("Ana", 19));
        lista.add(new Pessoa("Felipe", 25));
        /* Define um nome para busca */
        String nomeBusca = "Ana";
        /* Variável encontrado inicialmente definida com false */
        boolean encontrado = false;
        /* Percorre a lista */
        for (int i = 0; i < lista.size(); i++) {
            /* Compara os nome ignorando maiúsculas e minúsculas */
            if (lista.get(i).getNome().equalsIgnoreCase(nomeBusca)) {
                lista.get(i).setIdade(21);
                encontrado = true;
                System.out.println("Nome: " + lista.get(i).getNome());
                System.out.println("Idade: " + lista.get(i).getIdade());
            }
        }
        /* Testa se a variável encontrado continua false */
        if (!encontrado) {
            System.out.println("Nome nao encontrado!");
        }
    }
}