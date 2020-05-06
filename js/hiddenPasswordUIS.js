var btnHiddenPassword3 = document.getElementById('btn-hidden-password3');
var passwordUser2 = document.getElementById('password-user2');
var iHiddenPassword3 = document.getElementById('fasIconHiddenPassword3');

document.querySelector('#btn-hidden-password3').addEventListener('click', () => {
    passwordUser2.classList.toggle('active-hidden');

    if (passwordUser2.classList.contains('active-hidden')) {
        localStorage.setItem('active-hidden2', 'true');
        iHiddenPassword3.classList.replace('fa-eye-slash', 'fa-eye');
    }else{
        localStorage.setItem('active-hidden2', 'false');
        iHiddenPassword3.classList.replace('fa-eye', 'fa-eye-slash');
    }
});

if (localStorage.getItem('active-hidden2') === 'true') {
    passwordUser2.classList.add('active-hidden');
    iHiddenPassword3.classList.remove('fa-eye-slash');
    iHiddenPassword3.classList.add('fa-eye');
}else{
    passwordUser2.classList.remove('active-hidden');
    iHiddenPassword3.classList.remove('fa-eye');
    iHiddenPassword3.classList.add('fa-eye-slash');
}