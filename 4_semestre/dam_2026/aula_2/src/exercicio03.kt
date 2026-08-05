fun main() {
    print("Digite um texto: ")
    val texto = readLine() ?: ""
        .lowercase()
        texto.replace(" ","")
    val textoReverso = texto.reversed()

    if (texto == textoReverso){
        print("é")
    } else print("não é")

}