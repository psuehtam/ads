fun main() {
    print("Digite uma frase: ")
    val texto = readLine().orEmpty()

    val textoHifen = texto.replace(" ", "-")
    print(textoHifen)


}