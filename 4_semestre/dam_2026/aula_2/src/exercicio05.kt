fun main() {
    print("Digite o primeiro numero: ")
    val num1: Double? = readLine()?.toDoubleOrNull()

    print("Digite o segundo numero: ")
    val num2: Double? = readLine()?.toDoubleOrNull()

    print("Digite o terceiro numero: ")
    val num3: Double? = readLine()?.toDoubleOrNull()

    val soma = num1 + num2 + num3
}