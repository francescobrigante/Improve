//gestione click al di fuori del menu dropdown di account
document.addEventListener('click', function(event) {
    var dropdown = document.getElementById('dropdown');
    var account = document.getElementById('account');
    
    if (!dropdown.contains(event.target) && !account.contains(event.target)) {
        if ($("#dropdown").css("display") == "block") {
            $("#dropdown").hide();
            $("#icon_account").show();
            $("#orange_account").hide();
        }
    }
});

//gestione animazione account e click
$(document).ready(function(){
    $("#account").click(function(){
        // Se il menu non è visibile
        if ($("#dropdown").css("display") == "none") {
            $("#dropdown").css("display", "block");
        } else { 
            // Se il menu è visibile
            $("#dropdown").hide();
        }
    });
});

function openPopupNuovaScheda(){
    document.getElementById("nuovaschedapopup").classList.add("nuovaschedapopupactive")
    document.getElementById("overlay").classList.add("overlayactive");
}

function closePopupNuovaScheda(){
    document.getElementById("nuovaschedapopup").classList.remove("nuovaschedapopupactive")
    document.getElementById("overlay").classList.remove("overlayactive");
    document.getElementById("boxaperto").style.display="none";
}


function creaBox(){
    var nomescheda = document.getElementById("nomescheda").value;
    //non puoi salvare una scheda senza nome
    if(nomescheda == ''){
        alert("Non puoi salvare una scheda senza nome");
        return;
    }

    var boxschede = document.querySelectorAll('.box-scheda');
    var flag = 0; 
    boxschede.forEach(function(box) {
        var nome = box.querySelector('h1').textContent;
        if (nomescheda == nome){
            flag=1;
        }
    });

    if(flag){
        alert("Non puoi salvare due schede con lo stesso nome");
        document.getElementById("nomescheda").value = "";
        return;
    }

    closePopupNuovaScheda();

    //parte di ajax per aggiungere la scheda vuota al db
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/nuovascheda.php", true);
    //indica che simuliamo un form
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Gestisci la risposta del server se necessario
            console.log('Richiesta inviata con successo.');
            location.reload();
        
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
            // Gestisci gli errori se la richiesta non è stata inviata
            console.error('Errore durante l\'invio della richiesta:', xhr.statusText);
        }
    };
    xhr.send("nomescheda=" + encodeURIComponent(nomescheda));
}



function eliminaScheda(nomescheda){
    closePopupEliminaScheda(nomescheda);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/nuovascheda.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Gestisci la risposta del server se necessario
            console.log('Richiesta inviata con successo.');
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
            // Gestisci gli errori se la richiesta non è stata inviata
            console.error('Errore durante l\'invio della richiesta:', xhr.statusText);
        }
    };
    xhr.send("eliminascheda=" + encodeURIComponent(nomescheda)); 
    
    //parte per cancellare l'elemento dal DOM
    //cancello classe box scheda
    var boxes = document.querySelectorAll('.box-scheda');
    boxes.forEach(function(box) {
        var testo_h1 = box.querySelector('h1').textContent;
        if(testo_h1 == nomescheda){
            box.remove();}
    });
    //cancello overlay e popup
    var overlay = document.querySelector('#' + nomescheda + '3Dotsoverlay');
    overlay.remove();
    var popup = document.querySelector('#eliminaschedapopup' + nomescheda);
    popup.remove();    
}

function Open3Dots(id){
    document.getElementById(id + "overlay").classList.add("overlay3dotsactive"); 
    document.getElementById(id).classList.add("DD3Dactive");

}

function Close3Dots(id){
    document.getElementById(id + "overlay").classList.remove("overlay3dotsactive"); 
    document.getElementById(id).classList.remove("DD3Dactive");
    

}

function openPopupEliminaScheda(id1,id2){
    // alert("eliminaschedapopup"+id2);
    document.getElementById(id1 + "overlay").classList.remove("overlay3dotsactive"); 
    document.getElementById(id1).classList.remove("DD3Dactive");
    document.getElementById("eliminaschedapopup"+id2).classList.add("eliminaschedapopupactive");
    document.getElementById("overlayelimina").classList.add("overlayeliminaactive");
}

function closePopupEliminaScheda(id){
    document.getElementById("eliminaschedapopup"+id).classList.remove("eliminaschedapopupactive")
    document.getElementById("overlayelimina").classList.remove("overlayeliminaactive");
} 

function openPopupRinominaScheda(id){
    //salvo il nome dell'ultima scheda aperta con rinomina in un cookie
    document.cookie = "nomescheda="+id;
    //l'id era originariamente concatenato a 3Dots, lo concateno
    id=id+'3Dots';
    document.getElementById(id + "overlay").classList.remove("overlay3dotsactive"); 
    document.getElementById(id).classList.remove("DD3Dactive");
    document.getElementById("rinominaschedapopup").classList.add("rinominaschedapopupactive")
    document.getElementById("overlayrinomina").classList.add("overlayrinominaactive");
}

function closePopupRinominaScheda(){
document.getElementById("rinominaschedapopup").classList.remove("rinominaschedapopupactive")
document.getElementById("overlayrinomina").classList.remove("overlayrinominaactive");
}

function rinominaScheda(){
    //riprendiamo il nome della scheda dal cookie
    var cookies = document.cookie.split(';');
    var nomescheda = "";
    var chiaveCookie="nomescheda=";

    cookies.forEach(function(cookie) {
        var cookieTrimmed = cookie.trim(); //per togliere spazi bianchi
        if (cookieTrimmed.indexOf(chiaveCookie) === 0) {
            nomescheda = cookieTrimmed.substring(chiaveCookie.length);
        }
    });

    // alert(nomescheda);
    nuovonome = document.getElementById('rinomina').value;

    //controlli nuovonome
    if(nuovonome == ''){
        alert("Non puoi salvare una scheda senza nome");
        return;
    }

    var boxschede = document.querySelectorAll('.box-scheda');
    var flag = 0; 
    boxschede.forEach(function(box) {
        var nome = box.querySelector('h1').textContent;
        if (nuovonome == nome){
            flag=1;
        }
    });

    if(flag){
        alert("Non puoi salvare due schede con lo stesso nome");
        document.getElementById("rinomina").value = "";
        return;
    }

    closePopupRinominaScheda();

    //parte per rinominare l'elemento del DOM
    var boxes = document.querySelectorAll('.box-scheda');
    boxes.forEach(function(box) {
        var testo_h1 = box.querySelector('h1').textContent;
        if(testo_h1 == nomescheda){
            box.querySelector('h1').textContent = nuovonome;
        }
    });

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/nuovascheda.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Gestisci la risposta del server se necessario
            console.log('Richiesta inviata con successo.');
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
            // Gestisci gli errori se la richiesta non è stata inviata
            console.error('Errore durante l\'invio della richiesta:', xhr.statusText);
        }
    };

    var params = "rinominascheda1=" + encodeURIComponent(nomescheda) + "&rinominascheda2=" + encodeURIComponent(nuovonome);
    xhr.send(params); 
}

function openScheda(id){
    document.getElementById(id+"overlay").classList.add("overlayactive");
    document.getElementById(id).style.display="block";
}

function CloseScheda(id){
    document.getElementById(id+"overlay").classList.remove("overlayactive");
    document.getElementById(id).style.display="none";
}
