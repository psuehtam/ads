public class Biblioteca {
    public static void main(String [] args) throws Exception{
        Livro l1 = new Livro("Java Basico", "João Silva",2020,150);
        Livro l2 = new Livro("POO na pratica", "Maria Souza",2022,150);

        l1.emprestarLivro();
        System.out.println("");
        System.out.print(l1);
        System.out.println("");
        l1.emprestarLivro();
        System.out.println("");
        l1.lerPaginas(12);
        System.out.println("");
        System.out.print(l1);
        System.out.println("");
        l1.devolverLivro();
        System.out.println("");
        System.out.print(l1);
        System.out.println("");
        l1.calcularProgressoLeitura();
        System.out.println("");
        l1.mostrarStatus();


    }
}
