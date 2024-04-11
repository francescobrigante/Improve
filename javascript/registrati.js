function validaForm(){

    var username = document.getElementById("username").value; 
    var password = document.getElementById("password").value; 
    var nome = document.getElementById("nome").value; 
    var cognome = document.getElementById("cognome").value; 
    var email = document.getElementById("email").value; 
    var cpassword = document.getElementById("cpassword").value;
    var regexLiteral = /[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}/;
    var dataObj = document.getElementById("data").value;
    var annoCorrente = dataObj.getFullYear();
    var annoMinimo = annoCorrente - 16;
    var annoMassimo = annoCorrente - 100;
    // rendere obbligatori anche data nascita e sesso
    
    if(username =="" || password=="" || nome=="" || cognome=="" || email==""){
        alert("Inserire tutti i dati");
        return false;
    }
    if(password.length < 8){
        alert("La password deve essere di almeno 8 caratteri");
        return false;
    }
    if(password!=cpassword){
        alert("Le password non coincidono");
        return false;
    }
    if(!regexLiteral.test(document.registr.email.value)){
        alert("Inserisci un indirizzo email valido");
        return false;
    }
    if(dataObj.getFullYear() < annoMassimo || dataObj.getFullYear() > annoMinimo){
        alert("Inserisci una data di nascita valida");
        return false;
    }
    return true;
}
