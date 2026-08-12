class Produto(val id: Int, val nome: String,val preco: Double ) {

    companion object {
       const val VALOR_MINIMO_PRECO = 0.50

        fun criarProduto(
            id: Int,
            nome: String,
            preco: Double
        ): Produto? {
            if (preco >= VALOR_MINIMO_PRECO) {
                return Produto(id, nome, preco)

            } else {
                return null
            }
        }
    }


}
fun main(){

    val p1 = Produto.criarProduto(1, "Arroz", 10.0)
    val p2 = Produto.criarProduto(2, "Bala", 0.20)

    p1?.let {
        println("Nome: ${it.nome}")
        println("Preço: ${it.preco}")
    }

    p2?.let {
        println("Nome: ${it.nome}")
        println("Preço: ${it.preco}")
    }
}