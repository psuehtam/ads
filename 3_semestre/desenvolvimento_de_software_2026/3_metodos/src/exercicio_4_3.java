public class exercicio_4_3 {
    public static int mutiplicar(int num1, int num2){
        return num1 * num2;
    }
    public static int mutiplicar(int num1, int num2, int num3){
        return num1 * num2 * num3;
    }

    public static void main(String[] args){
        System.out.println(mutiplicar(2,2));
        System.out.println(mutiplicar(2,2,2));
    }
}
