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