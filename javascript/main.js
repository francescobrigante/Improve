function showOrangeHome() {
    document.getElementById("home").style.display = "none";
    document.getElementById("orange_home").style.display = "inline-block";
}

function showOriginalHome() {
    document.getElementById("home").style.display = "inline-block";
    document.getElementById("orange_home").style.display = "none";
}

$(document).ready(function(){
    $("#account").on({
        click: function(){
            //se il menu non è visibile
            if($("#dropdown").css("display") == "none"){
                $("#dropdown").css("display", "block");
                $("#icon_account").hide();
                $("#orange_account").show();
            }
            //se il menu è visibile
            else{
                $("#dropdown").fadeOut();
                $("#icon_account").show();
                $("#orange_account").hide();                       
            }
        },

        mouseenter: function(){
            $("#icon_account").hide();
            $("#orange_account").show();                        
        },

        mouseleave: function(){
            //per impedire che ritorni bianco quando il menu è aperto e il mouse esce dall'icona
            if($("#dropdown").css("display") == "none"){
                $("#icon_account").show();
                $("#orange_account").hide(); 
            }
        }
    });

});

// Funzione per cambiare il testo del bottone a "Nuova Scheda"
function changeToNuovaScheda() {
    const button = document.querySelector('.nuovascheda');
    button.textContent = 'Nuova scheda';
}

// Funzione per cambiare il testo del bottone a "+"
function changeToPlus() {
    const button = document.querySelector('.nuovascheda');
    button.textContent = '+';
}

function openPopup(popup, overlay){
    document.getElementById(popup).classList.add("popupactive");
    document.getElementById(overlay).classList.add("overlayactive");
}

function closePopup(popup, overlay){
    document.getElementById(popup).classList.remove("popupactive");
    document.getElementById(overlay).classList.remove("overlayactive");
}

let clickcount = 0 ; 
function FilterAnimation(){
    if ( clickcount % 2 === 0 ){
    // Primo click: Esegui animazione 1
        document.getElementById("bars").classList.add("rotatebars");
        document.getElementById("list").classList.add("list-items-open");
    }
    // Secondo click: Esegui animazione 2
    else{ 
        document.getElementById("bars").classList.remove("rotatebars");
        document.getElementById("list").classList.remove("list-items-open");     
    }
    clickcount++;
}

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