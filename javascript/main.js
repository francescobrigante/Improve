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

function openPopup(popup, overlay){
    document.getElementById(popup).classList.add("popupactive");
    document.getElementById(overlay).classList.add("overlayactive");
}

function closePopup(popup, overlay){
    document.getElementById(popup).classList.remove("popupactive");
    document.getElementById(overlay).classList.remove("overlayactive");
}

function FilterAnimation(){
    var bars = document.getElementById("bars");
    var list = document.getElementById("list");

    if (!bars.classList.contains("rotatebars")){
        bars.classList.add("rotatebars");
        list.classList.add("list-items-open");
    }
    else{ 
        bars.classList.remove("rotatebars");
        list.classList.remove("list-items-open");     
    }
}

// gestione click fuori da filtro che implica chiusura filtro
document.addEventListener('click', function(event) {
    var contenitore = document.getElementById('contenitore_filtro');
    var filter = document.getElementById('filter');
    
    //se il clic è avvenuto al di fuori del menu a tendina e del pulsante di apertura
    if (!contenitore.contains(event.target) && !filter.contains(event.target)) {
       
        //nascondi il menu se è visibile
        if (document.getElementById("list").classList.contains("list-items-open")) {
            document.getElementById("bars").classList.remove("rotatebars");
            document.getElementById("list").classList.remove("list-items-open");
        }
    }
});

function CheckBox(muscolo){
    var results = document.querySelectorAll('.scrollbox .box-exercise');
    if (!document.getElementById(muscolo).classList.contains("check-icon-checked")){
        document.getElementById(muscolo).classList.remove("check-icon"); 
        document.getElementById(muscolo).classList.add("check-icon-checked"); 

        results.forEach(function(result) {
            var testo_h2 = result.querySelector('h2').textContent.toLowerCase();
            var muscolo_lower = muscolo.toLowerCase();
            if (testo_h2 == muscolo_lower)
                result.classList.remove('hidden');
        });
    }
    else{
        //ci deve essere almeno un elemento selezionato nel filtro 
        var num_caselle_checked = document.querySelectorAll(".check-icon-checked").length;
        if(num_caselle_checked <= 1)
            return;

        document.getElementById(muscolo).classList.remove("check-icon-checked");
        document.getElementById(muscolo).classList.add("check-icon"); 

        results.forEach(function(result) {
            var testo_h2 = result.querySelector('h2').textContent.toLowerCase();
            var muscolo_lower = muscolo.toLowerCase();
            if (testo_h2 == muscolo_lower)
                result.classList.add('hidden');
        });
    }
}

// per la searchbar
document.querySelector('.search-bar input').addEventListener('input', search);

// Funzione di ricerca
function search() {
    var input = document.querySelector('.search-bar input').value.toLowerCase();
    var results = document.querySelectorAll('.scrollbox .box-exercise'); 
    results.forEach(function(result) {
        displayfew();
        var testo_h1 = result.querySelector('h1').textContent.toLowerCase();
        var testo_h2 = result.querySelector('h2').textContent;
        var testo_h2_lower = testo_h2.toLowerCase();

        //controllo aggiuntivo per fare in modo che se un muscolo NON è selezionato
        //nel filtro, allora se si prova a cercarlo, esso non appare
        if (testo_h1.includes(input) || testo_h2_lower.includes(input)){
            if(document.getElementById(testo_h2).classList.contains("check-icon-checked"))
                result.classList.remove('hidden');
        }
        else
            result.classList.add('hidden');
    });
}

function displayfew() {
    var container = document.getElementById("scrollbox");
    var items = document.querySelectorAll('.box-exercise');
    
    // Conta il numero di elementi visibili
    var visibleItemCount = 0;
    items.forEach(function(item) {
        if (item.offsetHeight > 0) {
            visibleItemCount++;
        }
    });
    
    // Se la maggior parte degli elementi è nascosta, applica una classe per cambiare la disposizione
    if (visibleItemCount <= 3) {
        container.classList.add('minor3');
    }
    else{
        container.classList.remove('minor3');
    }
};

function GoToMieSchede(){
    window.location.href= './mieschede.php';
}