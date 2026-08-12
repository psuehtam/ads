open class Animal(val nome: String){
    open fun som(){
        println("~o animal fez um som")
    }


}

class Gato(nome: String) : Animal(nome){
    override fun som(){
        println("miau")
    }

}

class Cachorro(nome: String) : Animal(nome){
    override fun som(){
        println("au au au")
    }

}

fun main() {
    val animal = Animal("mimosa")

    val dog = Cachorro("pascal")
    println(dog.nome)
    dog.som()

    val cat = Gato("nico")
    println(cat.nome)
    cat.som()


}