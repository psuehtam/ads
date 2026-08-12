fun lerNumeros(quantidade: Int): IntArray {
    return IntArray(quantidade) {
        print("Digite seu número: ")
        readln().toIntOrNull() ?: 0
    }
}

fun filtrarPar(numeros: IntArray) {
    numeros
        .filter { it % 2 == 0 }
        .forEach { println("O número $it é par") }
}

fun somaDez(numeros: IntArray) {
    numeros
        .map { it + 10 }
        .forEach { println(it) }
}

fun quadrado(numeros: IntArray) {
    numeros
        .map { it * it }
        .forEach { println(it) }
}

fun dobro(numeros: IntArray) {
    numeros
        .map { it * 2 }
        .forEach { println(it) }
}

fun main() {
    println("=== PARES ===")
    val numerosPar = lerNumeros(5)
    filtrarPar(numerosPar)

    println("\n=== SOMAR 10 ===")
    val numerosSoma = lerNumeros(5)
    somaDez(numerosSoma)

    println("\n=== QUADRADO ===")
    val numerosQuadrado = lerNumeros(5)
    quadrado(numerosQuadrado)

    println("\n=== DOBRO ===")
    val numerosDobro = lerNumeros(5)
    dobro(numerosDobro)
}