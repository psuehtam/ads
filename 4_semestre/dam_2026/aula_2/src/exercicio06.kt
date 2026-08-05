fun main() {
    print("Digite o primeiro texto: ")
    val primeiroTexto = readln()

    print("Digite o segundo texto: ")
    val segundoTexto = readln()

    val primeiro = primeiroTexto
        .lowercase()
        .filter { it.isLetterOrDigit() }
        .toCharArray()
        .sorted()

    val segundo = segundoTexto
        .lowercase()
        .filter { it.isLetterOrDigit() }
        .toCharArray()
        .sorted()

    if (primeiro == segundo){
        println("Os textos são anagramas.")
    } else {
        println("Os textos não são anagramas.")
    }
}