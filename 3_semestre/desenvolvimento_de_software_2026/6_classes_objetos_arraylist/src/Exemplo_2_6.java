import java.util.Scanner;
import java.util.ArrayList;
class Exemplo_2_6 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<Pessoa> lista = new ArrayList<>();
        for(int i = 1; i <= 3; i++){
            System.out.print("Informe nome: ");
            String nome = scanner.nextLine();
            System.out.print("Informe idade: ");
            int idade = scanner.nextInt();
            /* Limpa o buffer */
            scanner.nextLine();
            /* Adiciona o objeto Pessoa ao ArrayList */
            lista.add(new Pessoa(nome, idade));
            System.out.println();
        }
        System.out.println("---- Listagem ----");
        /* Percorre a lista */
        for(int i = 0; i < lista.size(); i++){
            System.out.println("Nome: " + lista.get(i).getNome());
            System.out.println("Idade: " + lista.get(i).getIdade());
            System.out.println();
        }
    }
}