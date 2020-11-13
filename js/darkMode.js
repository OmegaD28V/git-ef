var cont = document.getElementById('main-container');
var section = document.getElementById('section');
var aModule = document.getElementsByClassName('a-module');
var navItems = document.getElementsByClassName('nav-items');
var pUopciones = document.getElementsByClassName('pU-opciones');
var pUactions = document.getElementsByClassName('pU-actions');
var header = document.getElementById('header');
var buttonAdjust = document.getElementById('button-adjust');
var multiForms = document.getElementsByClassName('multi-form');
var multiForms2 = document.getElementsByClassName('multi-form-edit');
var footer = document.getElementsByClassName('footer');
var fichas = document.getElementsByClassName('fichas');
var infoPro = document.getElementsByClassName('ficha-price-pro');
var inputs = document.getElementsByTagName('input');
var selects = document.getElementsByTagName('select');
var txtAreas = document.getElementsByTagName('textarea');
var extraBnt = document.getElementsByClassName('extra-button');
var extraBntS = document.getElementsByClassName('extra-button-small');
var line = document.getElementsByClassName('line-form');
var pntPrevious = document.getElementById('prev');
var pntPag = document.getElementsByClassName('pnt__pag');
var pntNext = document.getElementById('next');
const opt = document.getElementById('opt');
const gridInfoPro = document.getElementById('grid-info-pro');
const lblSw1 = document.getElementById('opt__sw1');
const selector1 = document.querySelector('#opt__switch1');

function activarTemaOscuro(){
    if (selector1 && lblSw1){
        selector1.checked = true;
        lblSw1.innerText = 'Tema Oscuro';
    }
    if (selector2 && lblSw2) {
        selector2.checked = false;
        lblSw2.innerHTML = 'Modo Lectura (Colores cálidos): Desactivado';
    }

    if (fichas.length > 0) {
        for (let i = 0; i < fichas.length; i++) {                
            fichas[i].classList.add('oscuro');
        }
    }
    if (multiForms.length > 0) {
        for (let i = 0; i < multiForms.length; i++) {                
            multiForms[i].classList.add('oscuro');
        }
    }
    if (multiForms2.length > 0) {
        for (let i = 0; i < multiForms2.length; i++) {                
            multiForms2[i].classList.add('oscuro');
        }
    }
    if (infoPro.length > 0) {
        for (let i = 0; i < infoPro.length; i++) {                
            infoPro[i].classList.add('oscuro');
        }
    }
    if (gridInfoPro) {
        gridInfoPro.classList.add('oscuro');
    }
    if (tables.length > 0) {
        for (let i = 0; i < tables.length; i++) {
            tables[i].classList.add('oscuro');
            
        }
    }
    if (cell.length > 0) {
        for (let i = 0; i < cell.length; i++) {
            cell[i].classList.add('oscuro');
            
        }
    }
    if (tblDarkGray.length > 0) {
        for (let i = 0; i < tblDarkGray.length; i++) {
            tblDarkGray[i].classList.add('oscuro');
            
        }
    }
    if (tblGray.length > 0) {
        for (let i = 0; i < tblGray.length; i++) {
            tblGray[i].classList.add('oscuro');
            
        }
    }
    if (forms.length > 0) {
        for (let i = 0; i < forms.length; i++) {
            forms[i].classList.add('oscuro');
            
        }
    }
    if (inputs.length > 0) {
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.add('oscuro');
            
        }
    }
    if (selects.length > 0) {
        for (let i = 0; i < selects.length; i++) {
            selects[i].classList.add('oscuro');
            
        }
    }
    if (txtAreas.length > 0) {
        for (let i = 0; i < txtAreas.length; i++) {
            txtAreas[i].classList.add('oscuro');
            
        }
    }
    if (extraBnt.length > 0) {
        for (let i = 0; i < extraBnt.length; i++) {
            extraBnt[i].classList.add('oscuro');
            
        }
    }
    if (extraBntS.length > 0) {
        for (let i = 0; i < extraBntS.length; i++) {
            extraBntS[i].classList.add('oscuro');
            
        }
    }
    if (line.length > 0) {
        for (let i = 0; i < line.length; i++) {
            line[i].classList.add('oscuro');
            
        }
    }
    if (opt) {
        opt.classList.add('oscuro');
    }
    if (navItems.length > 0) {
        for (let i = 0; i < navItems.length; i++) {
            navItems[i].classList.add('oscuro');
        }
    }
    if (pUopciones.length > 0) {
        for (let i = 0; i < pUopciones.length; i++) {
            pUopciones[i].classList.add('oscuro');
        }
    }
    if (pUactions.length > 0) {
        for (let i = 0; i < pUactions.length; i++) {
            pUactions[i].classList.add('oscuro');
        }
    }
    if (pntPrevious && pntPag.length > 0 && pntNext) {
        pntPrevious.classList.add('oscuro');
        pntNext.classList.add('oscuro');
        for (let i = 0; i < pntPag.length; i++) {
            pntPag[i].classList.add('oscuro');
            
        }
    }

    cont.classList.add('oscuro');
    section.classList.add('oscuro');
    header.classList.add('oscuro');
    buttonAdjust.classList.add('oscuro');
    if(aModule[0]){
        aModule[0].classList.add('oscuro');
    }
    if (footer[0]) {
        footer[0].classList.add('oscuro');
    }
}
function desactivarTemaOscuro(){
    if(selector1 && lblSw1){
        selector1.checked = false;
        lblSw1.innerText = 'Tema Claro';
    }

    if (fichas.length > 0) {
        for (let i = 0; i < fichas.length; i++) {                
            fichas[i].classList.remove('oscuro');
        }
    }
    if (multiForms.length > 0) {
        for (let i = 0; i < multiForms.length; i++) {                
            multiForms[i].classList.remove('oscuro');
        }
    }
    if (multiForms2.length > 0) {
        for (let i = 0; i < multiForms2.length; i++) {                
            multiForms2[i].classList.remove('oscuro');
        }
    }
    if (infoPro.length > 0) {
        for (let i = 0; i < infoPro.length; i++) {                
            infoPro[i].classList.remove('oscuro');
        }
    }
    if (gridInfoPro) {
        gridInfoPro.classList.remove('oscuro');
    }
    if (tables.length > 0) {
        for (let i = 0; i < tables.length; i++) {
            tables[i].classList.remove('oscuro');
            
        }
    }
    if (cell.length > 0) {
        for (let i = 0; i < cell.length; i++) {
            cell[i].classList.remove('oscuro');
            
        }
    }
    if (tblDarkGray.length > 0) {
        for (let i = 0; i < tblDarkGray.length; i++) {
            tblDarkGray[i].classList.remove('oscuro');
            
        }
    }
    if (tblGray.length > 0) {
        for (let i = 0; i < tblGray.length; i++) {
            tblGray[i].classList.remove('oscuro');
            
        }
    }
    if (forms.length > 0) {
        for (let i = 0; i < forms.length; i++) {
            forms[i].classList.remove('oscuro');
            
        }
    }
    if (inputs.length > 0) {
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.remove('oscuro');
            
        }
    }
    if (selects.length > 0) {
        for (let i = 0; i < selects.length; i++) {
            selects[i].classList.remove('oscuro');
            
        }
    }
    if (txtAreas.length > 0) {
        for (let i = 0; i < txtAreas.length; i++) {
            txtAreas[i].classList.remove('oscuro');
            
        }
    }
    if (extraBnt.length > 0) {
        for (let i = 0; i < extraBnt.length; i++) {
            extraBnt[i].classList.remove('oscuro');
            
        }
    }
    if (extraBntS.length > 0) {
        for (let i = 0; i < extraBntS.length; i++) {
            extraBntS[i].classList.remove('oscuro');
            
        }
    }
    if (line.length > 0) {
        for (let i = 0; i < line.length; i++) {
            line[i].classList.remove('oscuro');
            
        }
    }
    if (opt) {
        opt.classList.remove('oscuro');
    }
    if (navItems.length > 0) {
        for (let i = 0; i < navItems.length; i++) {
            navItems[i].classList.remove('oscuro');
        }
    }
    if (pUopciones.length > 0) {
        for (let i = 0; i < pUopciones.length; i++) {
            pUopciones[i].classList.remove('oscuro');
        }
    }
    if (pUactions.length > 0) {
        for (let i = 0; i < pUactions.length; i++) {
            pUactions[i].classList.remove('oscuro');
        }
    }
    if (pntPrevious && pntPag.length > 0 && pntNext) {
        pntPrevious.classList.remove('oscuro');
        pntNext.classList.remove('oscuro');
        for (let i = 0; i < pntPag.length; i++) {
            pntPag[i].classList.remove('oscuro');
        }
    }

    cont.classList.remove('oscuro');
    section.classList.remove('oscuro');
    header.classList.remove('oscuro');
    buttonAdjust.classList.remove('oscuro');
    if (aModule[0]) {
        aModule[0].classList.remove('oscuro');
    }
    if (footer[0]) {
        footer[0].classList.remove('oscuro');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    //Obtener el modo actual
    if (localStorage.getItem('dark') === '1') {
        activarTemaOscuro();
        desactivarModoLectura();
    }else{
        desactivarTemaOscuro();
    }
});

if(selector1){
    selector1.addEventListener('click', () => {
        //Guardar el modo actual en localStorage
        if (selector1.checked) {
            localStorage.setItem('dark', '1');
            localStorage.setItem('read', '0');
        }else{
            localStorage.setItem('dark', '0');
        }

        if(localStorage.getItem('dark') === '1'){
            activarTemaOscuro();
            desactivarModoLectura();
        }else{
            desactivarTemaOscuro();
        }

    });
}