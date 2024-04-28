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
    document.getElementById(popup).classList.add("popupactive")
    document.getElementById(overlay).classList.add("overlayactive");
}

function closePopup(popup, overlay){
    document.getElementById(popup).classList.remove("popupactive")
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

let counterPetto = 0 ;
function CheckBoxPetto(){

    if (counterPetto % 2 === 0 ){
        document.getElementById("Petto").classList.add("check-icon-checked");
    }
    else{ 
        document.getElementById("Petto").classList.remove("check-icon-checked");
    }
    counterPetto++;
}

let counterSpalle = 0 ;
function CheckBoxSpalle(){

    if (counterSpalle % 2 === 0 ){
        document.getElementById("Spalle").classList.add("check-icon-checked");
    }
    else{ 
        document.getElementById("Spalle").classList.remove("check-icon-checked");
    }
    counterSpalle++;
}

let counterTricipiti = 0 ;
function CheckBoxTricipiti(){

    if (counterTricipiti % 2 === 0 ){
        document.getElementById("Tricipiti").classList.add("check-icon-checked");
    }
    else{ 
        document.getElementById("Tricipiti").classList.remove("check-icon-checked");
    }
    counterTricipiti++;
}

let counterAddominali = 0 ;
function CheckBoxAddominali(){

    if (counterAddominali % 2 === 0 ){
        document.getElementById("Addominali").classList.add("check-icon-checked");
    }
    else{ 
        document.getElementById("Addominali").classList.remove("check-icon-checked");
    }
    counterAddominali++;
}

let counterBicipiti = 0 ;
function CheckBoxBicipiti(){

    if (counterBicipiti % 2 === 0 ){
        document.getElementById("Bicipiti").classList.add("check-icon-checked");
    }
    else{ 
        document.getElementById("Bicipiti").classList.remove("check-icon-checked");
    }
    counterBicipiti++;
}

let counterGambe = 0 ;
function CheckBoxGambe(){

    if (counterGambe % 2 === 0 ){
        document.getElementById("Gambe").classList.add("check-icon-checked");
    }
    else{ 
        document.getElementById("Gambe").classList.remove("check-icon-checked");
    }
    counterGambe++;
}