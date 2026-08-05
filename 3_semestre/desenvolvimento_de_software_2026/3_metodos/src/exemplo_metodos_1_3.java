public class exemplo_metodos_1_3 {
    public static void linha(int num, char caracter){
        for (int i = 1; i <=num; i++){
            System.out.print(caracter);
        }
        System.out.println();
    }


    public static void main(String[] args){
        linha(17,'&');
        System.out.println("Numeros de 1 a 5");
        linha(17,'&');
        for (int i = 1; i<=5;i++){
            System.out.println(i);
        }
        linha(17,'%');
    }
}