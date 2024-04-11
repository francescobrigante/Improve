function validaForm(){

    var username = document.getElementById("username").value; 
    var password = document.getElementById("password").value; 
    var nome = document.getElementById("nome").value; 
    var cognome = document.getElementById("cognome").value; 
    var email = document.getElementById("email").value; 
    var cpassword = document.getElementById("cpassword").value;
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
    return true;
}