
function validaForm(){

    var username = document.getElementById("username").value; 
    var password = document.getElementById("password").value; 
    var nome = document.getElementById("nome").value; 
    var cognome = document.getElementById("cognome").value; 
    var email = document.getElementById("email").value; 
    var cpassword = document.getElementById("cpassword").value;
    var regexEmail = /.+@.+\..+/;
    var regexPassword = /.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?].*/;
    
    if(username =="" || password=="" || nome=="" || cognome=="" || email==""){
        alert("Inserire tutti i dati");
        return false;
    }
    if(!regexEmail.test(email)){
        alert("Inserire un indirizzo email valido");
        return false;
    }

    if(password.length < 8){
         alert("La password deve essere di almeno 8 caratteri");
         return false;
    }
    
    if(!regexPassword.test(password)){
        alert("La password deve contenere almeno un carattere speciale");
        return false;
    }

    if(password!==cpassword){
        alert("Le password non coincidono");
        return false;
    }
    if(!regexEmail.test(document.registr.email.value)){
        alert("Inserisci un indirizzo email valido");
        return false;
    }
    return true;
}

document.getElementById('eyeIcon1').addEventListener('click', function() {
    var password = document.getElementById('password');
    var eyeIcon1 = document.getElementById('eyeIcon1');
    if (password.type === 'password') {
        password.type = 'text';
        eyeIcon1.classList.remove('fa-eye');
        eyeIcon1.classList.add('fa-eye-slash');
    } else {
        password.type = 'password';
        eyeIcon1.classList.remove('fa-eye-slash');
        eyeIcon1.classList.add('fa-eye');
    }
});

document.getElementById('eyeIcon2').addEventListener('click', function() {
    var cpassword = document.getElementById('cpassword');
    var eyeIcon2 = document.getElementById('eyeIcon2');
    if (cpassword.type === 'password') {
        cpassword.type = 'text';
        eyeIcon2.classList.remove('fa-eye');
        eyeIcon2.classList.add('fa-eye-slash');
    } else {
        cpassword.type = 'password';
        eyeIcon2.classList.remove('fa-eye-slash');
        eyeIcon2.classList.add('fa-eye');
    }
});
