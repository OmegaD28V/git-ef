var contenedor = document.getElementById('main-container');
var navegacion = document.getElementById('navegacion');
var adjust = document.getElementById('adjust');
var buttonNav = document.getElementById('button-nav');
var iDespliegueNav = document.getElementById('fasIconDesp');

// if (contenedor.classList.contains('active')) {
//     localStorage.setItem('activeMode', 'true');
// }else{
//     localStorage.setItem('activeMode', 'false');
// }

document.querySelector('#nav-button').addEventListener('click', () => {
    contenedor.classList.toggle('active');
    navegacion.classList.toggle('activeText');
    adjust.classList.toggle('activeText');
    buttonNav.classList.toggle('activeText');

    if (contenedor.classList.contains('active')) {
        localStorage.setItem('activeMode', 'true');
        iDespliegueNav.classList.replace('fa-angle-up', 'fa-angle-right');
    }else{
        localStorage.setItem('activeMode', 'false');
        iDespliegueNav.classList.replace('fa-angle-right', 'fa-angle-up');
    }
});

if (localStorage.getItem('activeMode') === 'true') {
    contenedor.classList.add('active');
    navegacion.classList.add('activeText');
    adjust.classList.add('activeText');
    buttonNav.classList.add('activeText');
    iDespliegueNav.classList.remove('fa-angle-up');
    iDespliegueNav.classList.add('fa-angle-right');
}else{
    contenedor.classList.remove('active');
    navegacion.classList.remove('activeText');
    adjust.classList.remove('activeText');
    buttonNav.classList.remove('activeText');
    iDespliegueNav.classList.remove('fa-angle-right');
    iDespliegueNav.classList.add('fa-angle-up');
}