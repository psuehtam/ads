fun main() {
    print("Digite um texto: ")
    val texto = readLine().orEmpty()

    val tamanhoTexto = texto.length
    print("Tamanho do texto: $tamanhoTexto\n")

    print("Digite o índice inicial: ")
    val inicial = readLine()?.toIntOrNull()

    if (inicial == null) {
        println("O índice inicial precisa ser um número.")
        return
    }
    if (inicial < 0 || inicial > tamanhoTexto) {
        println("O índice inicial precisa estar entre 0 e $tamanhoTexto.")
        return
    }

    print("Digite o índice final: ")
    val final = readLine()?.toIntOrNull()
    if (final == null) {
        println("O índice final precisa ser um número.")
        return
    }
    if (final < 0 || final > tamanhoTexto) {
        println("O índice final precisa estar entre 0 e $tamanhoTexto.")
        return
    }
    if (final < inicial) {
        println("O índice final não pode ser menor que o índice inicial.")
        return
    }

    val textoExtraido: String = texto.substring(inicial, final)
    print(textoExtraido)
}