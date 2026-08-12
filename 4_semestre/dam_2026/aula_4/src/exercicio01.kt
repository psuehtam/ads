data class Tarefa(
    val nome: String,
    val concluida: Boolean)

fun main(){

    val t1 = Tarefa(nome = "Acordar", concluida = true)
    val t2 = Tarefa(nome = "Estudar", concluida = true)
    val t3 = Tarefa(nome = "Trabalhar", concluida = false)
    val t4 = Tarefa(nome = "Dormir", concluida = false)

    val minhaLista = listOf(
        t1,
        t2,
        t3,
        t4)

    val pendentes = minhaLista.filter{
        tarefa -> !tarefa.concluida
    }
    for (tarefa in pendentes) {
        println(tarefa.nome)
    }
}