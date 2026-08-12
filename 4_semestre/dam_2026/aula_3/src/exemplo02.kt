fun executar(a: Int, b: Int, operacao:(Int, Int) -> Int) : Int{
    return operacao(a,b)
}
fun ola(){
    print("ola")
}

fun main(){

    executar(2,3) {x,y -> x - y
    }
    executar(2,3) {x,y -> x + y
    }

}

