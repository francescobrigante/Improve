function validaForm(){
    if(document.registr.username.value=="" || document.registr.password.value==""){
        alert("Inserisci username e password");
        return false;
    }
    return true;
}