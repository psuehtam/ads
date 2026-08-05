public class Clinica {
    public static void main(String[] args){
        Medico m1 = new Medico("Carlos", 67, "FullStack", 123456);
        Paciente p1 = new Paciente("Ana" , 19, "Cancer");

        Consulta consulta1 = new Consulta(p1, m1, "24/04/2026");

        System.out.println(consulta1);
    }
}