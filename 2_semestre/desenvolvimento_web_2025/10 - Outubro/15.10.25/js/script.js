// ola dev

let peso = prompt("Informe seu peso: ");
let altura = prompt("Informe sua altura: ");
console.log("Tipo de peso: " + typeof (peso));
console.log("Tipo de Altura: " + typeof (altura));

peso = parseFloat(peso);
altura = parseFloat(altura);

console.log("Tipo de peso: " + typeof (peso));
console.log("Tipo de Altura: " + typeof (altura));


let imc = peso / (altura * altura);

console.log("Seu IMC É: " + imc.toFixed(2));
alert("Seu IMC É: " + imc.toFixed(2));