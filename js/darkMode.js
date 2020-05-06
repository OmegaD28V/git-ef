var cont = document.getElementById('main-container');
var navButton = document.getElementById('nav-button');
var navItem1 = document.getElementById('nav-item1');
var navItem2 = document.getElementById('nav-item2');
var navItem3 = document.getElementById('nav-item3');
var navItem4 = document.getElementById('nav-item4');
var navItem5 = document.getElementById('nav-item5');
var navItem6 = document.getElementById('nav-item6');
var navItem7 = document.getElementById('nav-item7');
var header = document.getElementById('header');
var buttonAdjust = document.getElementById('button-adjust');

document.querySelector('#button-adjust').addEventListener('click', () => {
    cont.classList.toggle('oscuro');
    navButton.classList.toggle('oscuro');
    navItem1.classList.toggle('oscuro');
    navItem2.classList.toggle('oscuro');
    navItem3.classList.toggle('oscuro');
    navItem4.classList.toggle('oscuro');
    navItem5.classList.toggle('oscuro');
    navItem6.classList.toggle('oscuro');
    navItem7.classList.toggle('oscuro');
    buttonAdjust.classList.toggle('oscuro');
    header.classList.toggle('oscuro');

    //Guardar el modo actual en localStorage
    if (cont.classList.contains('oscuro')) {
        localStorage.setItem('dark-mode', 'true');
    }else{
        localStorage.setItem('dark-mode', 'false');
    }
});

//Obtener el modo actual
if (localStorage.getItem('dark-mode') === 'true') {
    cont.classList.add('oscuro');
    navButton.classList.add('oscuro');
    navItem1.classList.add('oscuro');
    navItem2.classList.add('oscuro');
    navItem3.classList.add('oscuro');
    navItem4.classList.add('oscuro');
    navItem5.classList.add('oscuro');
    navItem6.classList.add('oscuro');
    navItem7.classList.add('oscuro');
    buttonAdjust.classList.add('oscuro');
    header.classList.add('oscuro');
}else{
    cont.classList.remove('oscuro');
    navButton.classList.remove('oscuro');
    navItem1.classList.remove('oscuro');
    navItem2.classList.remove('oscuro');
    navItem3.classList.remove('oscuro');
    navItem4.classList.remove('oscuro');
    navItem5.classList.remove('oscuro');
    navItem6.classList.remove('oscuro');
    navItem7.classList.remove('oscuro');
    buttonAdjust.classList.remove('oscuro');
    header.classList.remove('oscuro');
}