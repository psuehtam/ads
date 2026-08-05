import java.util.ArrayList;
class Exemplo_1_6 {
    public static void main(String[] args) {
        ArrayList<Pessoa> lista = new ArrayList<>();
        /* Adiciona o objeto Pessoa ao ArrayList */
        lista.add(new Pessoa("Marcelo", 57));
        lista.add(new Pessoa("Ana", 19));
        lista.add(new Pessoa("Felipe",25));
        System.out.println("---- Listagem ----");
        /* Percorre a lista */

        for(int i = 0; i < lista.size(); i++){
            System.out.println("Nome: " + lista.get(i).getNome());
            System.out.println("Idade: " + lista.get(i).getIdade());
            System.out.println();
        }
    }
}