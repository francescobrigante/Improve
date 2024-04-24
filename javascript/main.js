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

// Recupera lo username dalla sessione (esempio)
var username = $_SESSION["username"];
alert(username);