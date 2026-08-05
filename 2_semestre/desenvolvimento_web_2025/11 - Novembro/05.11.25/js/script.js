const ligar = document.querySelector('#turn-on'); 
const desligar = document.querySelector('#turn-off');
const interruptor = document.querySelector('#switch');
const body = document.body;

ligar.addEventListener('click', ligarLamp);
desligar.addEventListener('click', desligarLamp);
interruptor.addEventListener('click', liga_desliga);

function ligarLamp() {
    interruptor.src = 'img/on.png';
        mudar_fundo();

}

function desligarLamp() {
    interruptor.src = 'img/off.png';
        mudar_fundo();

}

function liga_desliga() {
    console.log("clicou na img");
    if (interruptor.src.includes('on.png')) {
        interruptor.src = 'img/off.png';
            


    } else {
        interruptor.src = 'img/on.png';
           
        
    }
     mudar_fundo();

}

function mudar_fundo(){
    const src = interruptor.getAttribute('src');
if(src.includes('on.png')){
    body.style.backgroundColor = '#999';
} else {
    body.style.backgroundColor = '#333';
}
     }   
