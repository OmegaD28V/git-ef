var btnHiddenPassword = document.getElementById('btn-hidden-password');
var btnHiddenPassword2 = document.getElementById('btn-hidden-password2');
var passwordUser = document.getElementById('password-user');
var repasswordUser = document.getElementById('repassword-user');
var iHiddenPassword = document.getElementById('fasIconHiddenPassword');
var iHiddenPassword2 = document.getElementById('fasIconHiddenPassword2');


document.querySelector('#btn-hidden-password').addEventListener('click', () => {
    passwordUser.classList.toggle('active-hidden');
    repasswordUser.classList.toggle('active-hidden');

    if (passwordUser.classList.contains('active-hidden') || repasswordUser.classList.contains('active-hidden')) {
        localStorage.setItem('active-hidden', 'true');
        iHiddenPassword.classList.replace('fa-eye-slash', 'fa-eye');
        iHiddenPassword2.classList.replace('fa-eye-slash', 'fa-eye');    
    }else{
        localStorage.setItem('active-hidden', 'false');
        iHiddenPassword.classList.replace('fa-eye', 'fa-eye-slash');
        iHiddenPassword2.classList.replace('fa-eye', 'fa-eye-slash');    }
});

document.querySelector('#btn-hidden-password2').addEventListener('click', () => {
    passwordUser.classList.toggle('active-hidden');
    repasswordUser.classList.toggle('active-hidden');

    if (passwordUser.classList.contains('active-hidden') || repasswordUser.classList.contains('active-hidden')) {
        localStorage.setItem('active-hidden', 'true');
        iHiddenPassword.classList.replace('fa-eye-slash', 'fa-eye');
        iHiddenPassword2.classList.replace('fa-eye-slash', 'fa-eye');    
    }else{
        localStorage.setItem('active-hidden', 'false');
        iHiddenPassword.classList.replace('fa-eye', 'fa-eye-slash');
        iHiddenPassword2.classList.replace('fa-eye', 'fa-eye-slash');    }
});

if (localStorage.getItem('active-hidden') === 'true') {
    passwordUser.classList.add('active-hidden');
    repasswordUser.classList.add('active-hidden');
    iHiddenPassword.classList.remove('fa-eye-slash');
    iHiddenPassword2.classList.remove('fa-eye-slash');
    iHiddenPassword.classList.add('fa-eye');
    iHiddenPassword2.classList.add('fa-eye');    
}else{
    passwordUser.classList.remove('active-hidden');
    repasswordUser.classList.remove('active-hidden');
    iHiddenPassword.classList.remove('fa-eye');
    iHiddenPassword2.classList.remove('fa-eye');    
    iHiddenPassword.classList.add('fa-eye-slash');
    iHiddenPassword2.classList.add('fa-eye-slash');}