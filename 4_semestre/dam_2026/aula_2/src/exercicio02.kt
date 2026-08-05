fun main() {
    print("Digite um texto: ")
    val texto = readLine().orEmpty()

    val tamanhoTexto = texto.length
    print("Tamanho do texto: $tamanhoTexto")
}
