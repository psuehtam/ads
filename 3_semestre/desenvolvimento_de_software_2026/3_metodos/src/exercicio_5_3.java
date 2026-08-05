public class exercicio_5_3 {
    public static void verifica(int num){
        if (num %2==0 ){
            System.out.printf("%d é par\n", num);
        } else{
            System.out.printf("%d é impar\n", num);
        }
    }

    public static void main (String[] args){
        verifica(14);
    }
}
