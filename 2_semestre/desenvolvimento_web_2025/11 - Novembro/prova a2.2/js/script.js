
const USUARIO_CORRETO = 'Matheus';
const SENHA_CORRETA = '04122006';

function fazerLogin() {
    let usuarioDigitado = document.getElementById('username').value;
    let senhaDigitada = document.getElementById('password').value;
    
    if(usuarioDigitado === USUARIO_CORRETO && senhaDigitada === SENHA_CORRETA) {
        document.getElementById('login-message').innerHTML = 'Login feito com sucesso!';
        document.getElementById('login-message').style.color = 'green';
        alert('Login feito com sucesso!');
        console.log('Login feito com sucesso!');
    } else {
        document.getElementById('login-message').innerHTML = 'Usuário ou senha errados!';
        document.getElementById('login-message').style.color = 'red';
        alert('Usuário ou senha errados!');
        console.log('Usuário ou senha errados!');
    }
}

function mostrarMaisJogos() {
    let lista = document.getElementById('game-list');
    if (!lista) return;

    const adicionados = lista.querySelectorAll('.added-item');
    if (adicionados.length) {
        adicionados.forEach(function(li) { li.remove(); });
        document.getElementById('add-items-btn').textContent = 'EXIBIR DADOS';
        return;
    }

    let jogosExtras = [
        'Pokemon Go',
        'Clash Royale', 
        'CS2',
        'GTA V',
        'Rocket League'
    ];

    for (let i = 0; i < jogosExtras.length; i++) {
        let novoItem = document.createElement('li');
        novoItem.textContent = jogosExtras[i];
        novoItem.className = 'added-item';
        lista.appendChild(novoItem);
    }

    document.getElementById('add-items-btn').textContent = 'Mostrar Menos';
}

function mudarCores() {
    let corpo = document.body;
    
    if(corpo.classList.contains('modo-claro')) {
        corpo.classList.remove('modo-claro');
        corpo.classList.add('modo-escuro');
        document.getElementById('color-mode').textContent = 'Modo Claro';
    } else {

        corpo.classList.remove('modo-escuro');
        corpo.classList.add('modo-claro');
        document.getElementById('color-mode').textContent = 'Modo Escuro';
    }
}

document.getElementById('login-botao').addEventListener('click', fazerLogin);
document.getElementById('add-items-btn').addEventListener('click', mostrarMaisJogos);
document.getElementById('color-mode').addEventListener('click', mudarCores);