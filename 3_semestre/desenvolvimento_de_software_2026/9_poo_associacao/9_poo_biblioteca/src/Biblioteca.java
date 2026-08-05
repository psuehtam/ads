public class Biblioteca{
    public static void main(String[] args) {

        Cliente c1 = new Cliente("Matheus", 19);
        Livro l1 = new Livro("Harry Potter", "jk");

        Emprestimo emp1 = new Emprestimo(c1, l1, "24/04/2025");

        System.out.println(emp1);

    }
}