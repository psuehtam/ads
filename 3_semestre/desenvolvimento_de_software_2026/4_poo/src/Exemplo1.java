public class Exemplo1 {
    public static void main(String[] agrs) throws Exception{
        Pessoa p1 = new Pessoa("Matheus", 19, "141.278.169-88");
        p1.setNome("Gabriel");
        p1.setIdade(19);
        p1.apresentar();
        System.out.println(p1.getNome());
        System.out.println(p1.getIdade());
        System.out.println(p1.getCpf());


    }
}
