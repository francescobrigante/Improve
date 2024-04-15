function validaForm(){

    var username = document.getElementById("username").value; 
    var password = document.getElementById("password").value; 
    var nome = document.getElementById("nome").value; 
    var cognome = document.getElementById("cognome").value; 
    var email = document.getElementById("email").value; 
    var cpassword = document.getElementById("cpassword").value;
    var regexEmail = /.+@.+\..+/;
    
    if(username =="" || password=="" || nome=="" || cognome=="" || email==""){
        alert("Inserire tutti i dati");
        return false;
    }
    if(!regexEmail.test(email)){
        alert("Inserire un indirizzo email valido");
        return false;
    }
    // if(password.length < 8){
    //     alert("La password deve essere di almeno 8 caratteri");
    //     return false;
    // }
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

function showOrangeHome() {
    document.getElementById("home").style.display = "none";
    document.getElementById("orange_home").style.display = "inline-block";
}

function showOriginalHome() {
    document.getElementById("home").style.display = "inline-block";
    document.getElementById("orange_home").style.display = "none";
}