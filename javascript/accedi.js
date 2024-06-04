
function validaForm(){
    if(document.accedi.username.value=="" || document.accedi.password.value==""){
        alert("Inserisci username e password");
        return false;
    }
    return true;
}

document.getElementById('eyeIcon').addEventListener('click', function() {
    var password = document.getElementById('password');
    var eyeIcon = document.getElementById('eyeIcon');
    if (password.type === 'password') {
        password.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        password.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
});
