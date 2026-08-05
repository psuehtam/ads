import java.util.*;

public class Agenda {
    static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<Contato> lista = new ArrayList<>();

        int opcao = 0;
        while (true) {
            menuPrincipal();
            opcao = scanner.nextInt();
            scanner.nextLine();
            if (opcao == 5) {
                break;
            }
            switch (opcao) {
                case 1:
                    adicionarContato(scanner, lista);
                    break;

                case 2:
                    listarContatos(lista);
                    editarContato(scanner, lista);
                    break;

                case 3:
                    excluirContato(scanner, lista);
                    break;

                case 4:
                    listarContatos(lista);
                    break;

                default:
                    System.out.println("Opcao invalida!");
            }

            System.out.println();
        }

        scanner.close();
    }

    public static void menuPrincipal() {
        System.out.println("======= AGENDA =======");
        System.out.println("[1] Adicionar contato");
        System.out.println("[2] Editar contato");
        System.out.println("[3] Excluir contato");
        System.out.println("[4] Listar contatos");
        System.out.println("[5] Sair");
        System.out.print("\nEscolha uma opcao: ");
    }

    public static void menuEditar() {
        System.out.println("\n=== EDITAR CONTATO ===");
        System.out.println("[1] Editar nome");
        System.out.println("[2] Editar telefone");
        System.out.println("[3] Editar email");
        System.out.println("[4] Voltar");
        System.out.print("\nEscolha uma opcao: ");
    }

    public static void adicionarContato(Scanner scanner, ArrayList<Contato> lista) {
        System.out.print("Nome: ");
        String nome = scanner.nextLine();
        System.out.print("Telefone: ");
        String telefone = scanner.nextLine();
        System.out.print("E-mail: ");
        String email = scanner.nextLine();
        lista.add(new Contato(nome, telefone, email));
    }
    public static void listarContatos(ArrayList<Contato> lista){
        if (lista.isEmpty()){
            System.out.println("Agenda esta vazia!");
            return;
        }
        System.out.printf("\n%-30s | %-20s | %-10s\n", "Nome", "Telefone", "E-mail");

        for (int i = 0; i < lista.size(); i++) {
            System.out.printf("%-30s | %-20s | %-10s\n",
                    lista.get(i).getNome(), lista.get(i).getTelefone(), lista.get(i).getEmail());

        }
    }
    public static int buscarContato(ArrayList<Contato> lista, String nome) {
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNome().equalsIgnoreCase(nome)) {
                return i;
            }
        }
        return -1;
    }

    public static void editarContato(Scanner scanner, ArrayList<Contato> lista) {
        System.out.print("Qual usuario deseja alterar? ");
        String nomeBuscado = scanner.nextLine();

        int encontrado = buscarContato(lista, nomeBuscado);

        if (encontrado == -1) {
            System.out.println("Contato não encontrado!");
            return;
        }

        Contato contato = lista.get(encontrado);

        while (true) {
            menuEditar();
            int opcao = scanner.nextInt();
            scanner.nextLine();

            if (opcao == 4) break;

            switch (opcao) {
                case 1:
                    System.out.print("Novo nome: ");
                    contato.setNome(scanner.nextLine());
                    break;

                case 2:
                    System.out.print("Novo telefone: ");
                    contato.setTelefone(scanner.nextLine());
                    break;

                case 3:
                    System.out.print("Novo email: ");
                    contato.setEmail(scanner.nextLine());
                    break;

                default:
                    System.out.println("Opcao invalida!");
            }
        }
    }

    public static void excluirContato(Scanner scanner, ArrayList<Contato> lista){
        System.out.print("Qual usuario deseja Excluir? ");
        String nomeBuscado = scanner.nextLine();

        int encontrado = buscarContato(lista, nomeBuscado);

        if (encontrado == -1) {
            System.out.println("Contato não encontrado!");
            return;
        }

        String nomeExcluido = lista.get(encontrado).getNome();

        lista.remove(encontrado);
        System.out.println("Contato " + nomeExcluido + " foi excluido com sucesso");

    }

}