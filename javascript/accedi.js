function validaForm(){
    if(document.accedi.username.value=="" || document.accedi.password.value==""){
        alert("Inserisci username e password");
        return false;
    }
    return true;
}

function showOrangeHome() {
    document.getElementById("home").style.display = "none";
    document.getElementById("orange_home").style.display = "inline-block";
}

function showOriginalHome() {
    document.getElementById("home").style.display = "inline-block";
    document.getElementById("orange_home").style.display = "none";
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