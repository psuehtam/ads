open class Funcionario(val nome: String, val salario : Double){
    open fun calcularBonus() : Double{
        return salario*0.1
    }
}

class Gerente(nome: String, salario : Double) : Funcionario(nome, salario){
    override fun calcularBonus(): Double{
        return salario*0.15
    }
}


fun main(){
    val f1 = Funcionario("Pedro", 1500.00)
    val f2 = Funcionario("João", 1500.00)
    val g1 = Gerente("Gerson", 3000.00)

    val funcionarios = listOf(
        f1,
        f2,
        g1
    )

    funcionarios.forEach { funcionario -> println(funcionario.nome +"-" + funcionario.calcularBonus()) }
}


