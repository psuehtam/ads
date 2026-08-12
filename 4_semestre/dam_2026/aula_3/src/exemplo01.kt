
/*int soma (int a, int b){
return a + b
}
 */

fun sub(a: Int,b: Int) = a - b

fun soma(a: Int, b: Int): Int {
    return a + b
}

fun bemvindo(nome: String) {
    println("Bem vindo $nome") }

fun main(){

   println(soma(2,3))

   bemvindo("Maria")

    println(sub(2,3))
}