// "data class" é uma classe feita principalmente para guardar dados.
// Aqui, User tem dois dados: name e password.
data class User(
    val name: String,
    val password: String
)


// Criando uma classe chamada Pessoa.
//
// O que está dentro dos parênteses é o CONSTRUTOR PRIMÁRIO.
// Toda Pessoa precisa receber um nome quando for criada.
//
// O "val" faz com que nome também vire um atributo da Pessoa.
// Então depois podemos fazer: p1.nome
class Pessoa(val nome: String) {

    // O bloco init roda AUTOMATICAMENTE
    // toda vez que uma Pessoa é criada.
    init {
        println("~nova pessoa criada")
    }


    // Esse é um CONSTRUTOR SECUNDÁRIO.
    //
    // Ele permite criar uma Pessoa passando:
    // nome + idade
    //
    // Exemplo:
    // Pessoa("João", 67)
    //
    // O ": this(nome)" manda o nome para
    // o construtor principal ali de cima.
    constructor(nome: String, idade: Int) : this(nome) {

        // Atualmente não fazemos nada com "idade".
        // Ela é recebida, mas não é guardada.
    }

    companion object{
        fun fazAlgo(){
            println("olha, funcionou")
        }
    }


    // Método da classe Pessoa
    // Ou seja: uma ação que uma Pessoa pode executar.
    fun bomdia() {
        println("bom dia sou o $nome")
    }
}


fun main() {

    // Criando um OBJETO da classe Pessoa.
    //
    // Pessoa = classe / molde
    // p1 = objeto criado a partir desse molde
    //
    // Como estamos passando nome E idade,
    // Kotlin usa o construtor secundário.
    val p1 = Pessoa(nome = "João", idade = 67)


    // Acessando o atributo "nome" do objeto p1
    println(p1.nome)


    // Chamando o método bomdia() do objeto p1
    p1.bomdia()
}