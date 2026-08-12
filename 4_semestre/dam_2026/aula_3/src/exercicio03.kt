data class Produto(val nome: String, val preco: Double)

fun main(){

    val produtos = listOf(
        Produto("canera", 100.00),
        Produto("luz", 150.00),
        Produto("pc", 20.00),
        Produto("celualr", 50.00),
        Produto("joao", 800.00),
    )
}