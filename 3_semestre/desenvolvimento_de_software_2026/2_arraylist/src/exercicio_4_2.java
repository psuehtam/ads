import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class exercicio_4_2 {

    static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<String> alunos = new ArrayList<>();
        int opcao;
        while (true) {
            System.out.println("===== MENU =====");
            System.out.println("[1] Adicionar aluno");
            System.out.println("[2] Listar alunos");
            System.out.println("[3] Buscar aluno");
            System.out.println("[4] Remover aluno");
            System.out.println("[5] Sair");
            System.out.print("\nDigite a opção: ");
            opcao = scanner.nextInt();
            if (opcao == 5) {
                break;
            }
            switch (opcao) {
                case 1:
                    System.out.print("Digite o nome do aluno: ");
                    alunos.add(scanner.next());
                    System.out.println("Aluno adicionado com sucesso!");
                    break;
                case 2:
                    if (alunos.isEmpty()) {
                        System.out.println("Nenhum aluno cadastrado");
                        break;
                    }
                    Collections.sort(alunos);
                    System.out.println("Alunos cadastrados:");
                    int i = 1;
                    for (String aluno : alunos) {
                        System.out.printf("%d - %s\n", i, aluno);
                        i++;
                    }
                    break;
                case 3:
                    if (alunos.isEmpty()) {
                        System.out.println("Nenhum aluno cadastrado");
                        break;
                    }
                    System.out.println("Digite o nome do aluno: ");
                    String busca = scanner.next();
                    if (alunos.contains(busca)) {
                        System.out.println("Aluno encontrado");
                    } else {
                        System.out.println("Aluno não encontrado");
                    }
                    break;
                case 4:
                    if (alunos.isEmpty()) {
                        System.out.println("Nenhum aluno cadastrado");
                        break;
                    }
                    System.out.println("Digite o nome do aluno que deseja remover: ");
                    String buscaRemover = scanner.next();
                    if (alunos.contains(buscaRemover)) {
                        alunos.remove(buscaRemover);
                        System.out.println("Aluno removido com sucesso!");
                    } else {
                        System.out.println("Aluno não encotrado");
                    }
                    break;
                default:
                    System.out.println("Opção não encontrada");
            }
        }
        scanner.close();
    }
}