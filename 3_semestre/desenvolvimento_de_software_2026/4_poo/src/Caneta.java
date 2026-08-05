public class Caneta {
    String cor;
    float ponta;
    boolean tampada = true;

    public void status(){
        System.out.println("Cor: " + this.cor);
        System.out.println("Ponta: " + this.ponta);
        System.out.println("Tampada: " + (this.tampada ? "Sim":"Não"));
    }

    public void destampar(){
        this.tampada = false;
    }

    public void tampar(){
        this.tampada = true;
    }

    public void rabiscar(){
        if(tampada){
            System.out.println("Estou tampada, não posso rabiscar!");
        } else {
            System.out.println("Rabiscando...");
        }
    }
}
