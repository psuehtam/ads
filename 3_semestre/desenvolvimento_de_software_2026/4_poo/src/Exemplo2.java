public class Exemplo2 {
    public static void main(String[] args) throws Exception{
        Caneta c1 = new Caneta();
        c1.cor = "Azul";
        c1.ponta = 0.5f;
        c1.tampada = false;

        Caneta c2 = new Caneta();
        c2.cor = "Preta";
        c2.ponta = 1.0f;
        c2.tampada = false;


        c1.destampar();
        c1.status();
        c1.rabiscar();


    }
}
