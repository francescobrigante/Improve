function validaForm(){

    var username = document.getElementById("username").value; 
    var password = document.getElementById("password").value; 
    var cpassword = document.getElementById("cpassword").value;
    
    if(username || password ){
        alert("Inserisci username e password");
        return false;
    }
    if(password < 8){
        alert("La password deve essere di almeno 8 caratteri");
        return false;
    }
    if(password!=cpassword){
        alert("Le password non coincidono");
        return false;
    }
    return true;
}

//comento