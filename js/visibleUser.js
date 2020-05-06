var header = document.getElementById('header');
var section = document.getElementById('section');
var panelUsuario = document.getElementById('panel-usuario');
var buttonAdjust = document.getElementById('button-adjust');



document.querySelector('#button-adjust').addEventListener('click', () => {
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