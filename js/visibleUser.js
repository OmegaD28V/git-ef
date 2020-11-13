var header = document.getElementById('header');
var section = document.getElementById('section');
var panelUsuario = document.getElementById('panel-usuario');
var buttonAdjust = document.getElementById('button-adjust');



document.querySelector('#button-adjust').addEventListener('click', () => {
    if (localStorage.getItem('read') === '1') {
        panelUsuario.classList.add('read');
        panelUsuario.classList.remove('oscuro');
    }else if(localStorage.getItem('dark') === '1'){
        panelUsuario.classList.add('oscuro');
        panelUsuario.classList.remove('read');
    }else{
        panelUsuario.classList.remove('read');
        panelUsuario.classList.remove('oscuro');
    }
    panelUsuario.classList.toggle('visible');
});

// document.querySelector('#header').addEventListener('click', () => {
//     if (condition) {
        
//     }
//     panelUsuario.classList.remove('visible');
// });

document.querySelector('#section').addEventListener('click', () => {
    panelUsuario.classList.remove('visible');
});