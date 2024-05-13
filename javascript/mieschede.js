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
}

//fare che non puoi salvare due schede con stesso nome, eliminare eventlistener e sostituirli con altro
//implementare l'inserimento nel DB della scheda vuota, dopo che un utente preme aggiungi
//aggiungere overflow y nelle box di esercizi
function creaBox(){
    closePopupNuovaScheda();

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
                alert("Non puoi salvare due schede con lo stesso nome");
                return;
            }
        });
        
        var nuovoElemento = document.createElement("div");
        nuovoElemento.classList.add("box-scheda");
        var titolo = document.createElement("h1");
        titolo.textContent=nomescheda;
        nuovoElemento.appendChild(titolo);
        var contenitore = document.getElementById("scrollbox");
        contenitore.appendChild(nuovoElemento);
        nuovoElemento.addEventListener("click",function(){
            document.getElementById("overlay").classList.add("overlayactive");
    });

}

// document.addEventListener("DOMContentLoaded", function() {
//     var button = document.getElementById("aggiungi");
//     var contenitore = document.getElementById("scrollbox");
//     var annulla = document.getElementById("annulla");
//     var nomescheda = document.getElementById("nomescheda").value;

//     button.addEventListener("click", function() {
//         var nomescheda = document.getElementById("nomescheda").value;
//         //non puoi salvare una scheda senza nome
//         if( nomescheda == '')
//             return;

//         //non puoi salvare una scheda con un determinato nome se ne esiste una con tale nome
//         var boxschede = document.querySelectorAll('.box-scheda');
//         var flag = 0; 
//         boxschede.forEach(function(box) {
//             var nome = box.querySelector('h1').textContent;
//             if (nomescheda == nome)
//                 flag=1;
//         });
        
//         if(flag){
//             alert("suca");
//             return;
//         }

//         var nuovoElemento = document.createElement("div");
//         nuovoElemento.classList.add("box-scheda");
//         var titolo = document.createElement("h3")
//         titolo.textContent=document.getElementById("nomescheda").value
//         nuovoElemento.appendChild(titolo);
//         contenitore.appendChild(nuovoElemento);
//         nomescheda = document.getElementById("nomescheda").value="";
//         nuovoElemento.addEventListener("click",function(){
//             document.getElementById("overlay").classList.add("overlayactive");
//     });
// });

//     annulla.addEventListener("click",function(){
//         nomescheda = document.getElementById("nomescheda").value="";
//         });
// });