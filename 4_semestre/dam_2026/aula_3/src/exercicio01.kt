fun main(){
    print("Digite sua nota: ")
    val nota:Int = readln()?.toInt()?:0
  when (nota){
      in 9.. 10 -> print("A")
      in 7..8 -> print("B")
      in 5..6 -> print("C")
      in 3..5 -> print("D")
      in 0..2 ->print("F")


  }
}