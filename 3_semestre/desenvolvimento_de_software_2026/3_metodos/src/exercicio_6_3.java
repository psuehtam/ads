import java.util.*;

public class exercicio_6_3 {

    public static void tabuada(int num){
        for (int i = 1; i <= 10; i++) {
            System.out.println(i + "x" + num + "=" + i*num);
            
        }
    }
    public static void main(String[] args){
        tabuada(5);
    }
}
