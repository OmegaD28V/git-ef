// var cont = document.getElementById('main-container');
// var section = document.getElementById('section');
// var aModule = document.getElementsByClassName('a-module');
// var navItems = document.getElementsByClassName('nav-items');
// var pUopciones = document.getElementsByClassName('pU-opciones');
// var pUactions = document.getElementsByClassName('pU-actions');
// var header = document.getElementById('header');
// var buttonAdjust = document.getElementById('button-adjust');
// var footer = document.getElementsByClassName('footer');
// var fichas = document.getElementsByClassName('fichas');
// var infoPro = document.getElementsByClassName('ficha-price-pro');
// var pntPrevious = document.getElementById('prev');
// var pntPag = document.getElementsByClassName('pnt__pag');
// var pntNext = document.getElementById('next');
// const opt = document.getElementById('opt');
// const gridInfoPro = document.getElementById('grid-info-pro');
var iconFa = document.getElementsByClassName('fa');
var iconFas = document.getElementsByClassName('fas');
var forms = document.getElementsByTagName('form');
var tables = document.getElementsByTagName('table');
var tblDarkGray = document.getElementsByClassName('color-darkgray');
var tblGray = document.getElementsByClassName('color-gray');
var cell = document.getElementsByClassName('cell');
var navItemsActive = document.getElementsByClassName('module');
const lblSw2 = document.getElementById('opt__sw2');
const selector2 = document.querySelector('#opt__switch2');
const search = document.getElementById('search');

function activarModoLectura() {
    if (selector1 && lblSw1) {
        selector1.checked = false;
        lblSw1.innerText = 'Tema Claro';
    }
    if (selector2 && lblSw2) {
        selector2.checked = true;
        lblSw2.innerText = 'Modo Lectura (Colores cálidos): Activado';
    }

    if (opt) {
        opt.classList.add('read');
    }
    if (iconFa.length > 0) {
        for (let i = 0; i < iconFa.length; i++) {
            iconFa[i].classList.add('read');
        }
    }
    if (iconFas.length > 0) {
        for (let i = 0; i < iconFas.length; i++) {
            iconFas[i].classList.add('read');
        }
    }
    if (navItemsActive.length > 0) {
        for (let i = 0; i < navItemsActive.length; i++) {
            navItemsActive[i].classList.add('read');
        }
    }
    if (fichas.length > 0) {
        for (let i = 0; i < fichas.length; i++) {
            fichas[i].classList.add('read');
        }
    }
    if (forms.length > 0) {
        for (let i = 0; i < forms.length; i++) {
            forms[i].classList.add('read');
        }
    }
    if (tables.length > 0) {
        for (let i = 0; i < tables.length; i++) {
            tables[i].classList.add('read');
        }
    }
    search.classList.add('read');
    section.classList.add('read');
}
function desactivarModoLectura() {
    if (selector2) {
        selector2.checked = false;
        lblSw2.innerText = 'Modo Lectura (Colores cálidos): Desactivado';
    }
    if (opt) {
        opt.classList.remove('read');
    }
    if (iconFa.length > 0) {
        for (let i = 0; i < iconFa.length; i++) {
            iconFa[i].classList.remove('read');
        }
    }
    if (iconFas.length > 0) {
        for (let i = 0; i < iconFas.length; i++) {
            iconFas[i].classList.remove('read');
        }
    }
    if (navItemsActive.length > 0) {
        for (let i = 0; i < navItemsActive.length; i++) {
            navItemsActive[i].classList.remove('read');
        }
    }
    if (fichas.length > 0) {
        for (let i = 0; i < fichas.length; i++) {
            fichas[i].classList.remove('read');
        }
    }
    if (forms.length > 0) {
        for (let i = 0; i < forms.length; i++) {
            forms[i].classList.remove('read');
        }
    }
    if (tables.length > 0) {
        for (let i = 0; i < tables.length; i++) {
            tables[i].classList.remove('read');
        }
    }
    search.classList.remove('read');
    section.classList.remove('read');
}

document.addEventListener('DOMContentLoaded', () => {
    //Obtener el modo actual
    if (localStorage.getItem('read') === '1') {
        activarModoLectura();
        desactivarTemaOscuro();
    }else{
        desactivarModoLectura();
    }
});

if(selector2){
    selector2.addEventListener('click', () => {
        //Guardar el modo actual en localStorage
        if (selector2.checked) {
            localStorage.setItem('read', '1');
            localStorage.setItem('dark', '0');
        }else{
            localStorage.setItem('read', '0');
        }

        if(localStorage.getItem('read') === '1'){
            activarModoLectura();
            desactivarTemaOscuro();
        }else{
            desactivarModoLectura();
        }
    });
}