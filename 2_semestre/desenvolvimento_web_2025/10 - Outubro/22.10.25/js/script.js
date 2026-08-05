let number = document.getElementById("number-input");

function digitNumber(){
    let numero = Number(number.value)
    document.getElementById("antecessor").innerHTML = `O Antecessor é ${numero - 1}`
    document.getElementById("digitado").innerHTML = `O Numero Digitado é ${numero}`
    document.getElementById("sucessor").innerHTML = `O Sucesor é ${numero + 1}`
}

function mediaNotas(){
    let nota1 = Number (document.getElementById("nota1").value)
    let nota2 = Number (document.getElementById("nota2").value)
    let nota3 = Number (document.getElementById("nota3").value)
    let calculoMedia = (nota1 + nota2 + nota3) / 3
    document.getElementById("media").innerHTML = `À Media das notas é ${(calculoMedia).toFixed(2)}`
    if (calculoMedia >= 6){
        document.getElementById("status").innerHTML = `O Aluno está Aprovado`
    } else { 
        document.getElementById("status").innerHTML = `O Aluno não foi aprovado`
}   }