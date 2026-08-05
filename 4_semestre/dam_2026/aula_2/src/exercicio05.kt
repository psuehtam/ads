fun main() {
    print("Digite o primeiro numero: ")
    val num1: Double = readLine()?.toDoubleOrNull() ?:0.0

    print("Digite o segundo numero: ")
    val num2: Double = readLine()?.toDoubleOrNull() ?:0.0

    print("Digite o terceiro numero: ")
    val num3: Double = readLine()?.toDoubleOrNull() ?:0.0

    val soma = ((num1 + num2 + num3)/3)

  print(soma)
}