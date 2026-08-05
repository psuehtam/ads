import java.util.ArrayList;
import java.util.Comparator;
class Exemplo_3_6 {
    public static void main(String[] args) {
        ArrayList<Pessoa> lista = new ArrayList<>();
        /* Adiciona o objeto Pessoa ao ArrayList */
        lista.add(new Pessoa("Marcelo", 57));
        lista.add(new Pessoa("Ana", 19));
        lista.add(new Pessoa("Felipe",25));
        /* Classifica a lista por nome */
        lista.sort(Comparator.comparing(Pessoa::getNome));
        System.out.println("---- Listagem ----");
        /* Percorre a lista */
        for(int i = 0; i < lista.size(); i++){
            System.out.println("Nome: " + lista.get(i).getNome());
            System.out.println("Idade: " + lista.get(i).getIdade());
            System.out.println();
        }
    }
}