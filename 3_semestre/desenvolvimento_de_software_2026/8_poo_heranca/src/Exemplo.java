class Exemplo {
    public static void main(String[] args) {
        Pessoa p1 = new Pessoa();
        p1.setNome("Pedro");
        p1.setIdade(21);
        Aluno p2 = new Aluno();
        p2.setNome("Maria");
        p2.setIdade(19);
        p2.setMatricula(123);
        p2.setCurso("Computacao");
        Professor p3 = new Professor();
        p3.setNome("Claudio");
        p3.setIdade(42);
        p3.setEspecialidade("Programacao de Compuradores");
        p3.setSalario(5750.75);
        System.out.println(p1);
        System.out.println(p2);
        System.out.println(p3);
    }
}