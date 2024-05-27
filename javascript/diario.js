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


//parte relativa al calendario
const trainingDays = allenamenti.map(a => `${a.giorno}-${a.mese}-${a.anno}`);

const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

const months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio",
                "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), 
        lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), 
        lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), 
        lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { 
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) {
        // let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear();
        //funzione some restituisce true se almeno un elemento dell'array allenamenti è stato salvato nel db
        let isWorkoutDay = allenamenti.some(all => all.giorno == i && all.mese - 1 == currMonth && all.anno == currYear);
        let activeClass = isWorkoutDay ? "active" : "";
        liTag += `<li class="${activeClass}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { 
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; 
    daysTag.innerHTML = liTag;

    document.querySelectorAll(".days li").forEach(day => {
        day.addEventListener("click", (e) => {
            e.target.classList.toggle("active");

            let clickedDay = e.target.innerText;
            let clickedMonth = currMonth + 1; //+1 perchè altrimenti sarebbero da 0 a 11
            let clickedYear = currYear;

            //se si seleziona un giorno inactive
            if (e.target.classList.contains("inactive")) {
                if (parseInt(clickedDay) > 15) { // Se il giorno cliccato è maggiore del 15, allora è del mese precedente
                    clickedMonth = currMonth;
                    if (clickedMonth > 12) {
                        clickedMonth = 1; // Se si supera Dicembre, torna a Gennaio dell'anno successivo
                        clickedYear++;
                    }
                } else {
                    clickedMonth = currMonth + 2; // Altrimenti è del mese successivo
                    if (clickedMonth > 12) {
                        clickedMonth = 1; // Se si supera Dicembre, torna a Gennaio dell'anno successivo
                        clickedYear++;
                    }
                }
            }
    
            $.ajax({
                type: "POST",
                url: "../php/gestionediario.php",
                data: { giorno: clickedDay, mese: clickedMonth, anno: clickedYear },
                success: function(response) {
                    // Fai qualcosa dopo aver inserito il giorno nel database, se necessario
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Gestisci eventuali errori qui
                    console.error(xhr.responseText);
                }
            });   
        });
    });
}

renderCalendar();

//gestione cambio mese
prevNextIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if (currMonth < 0 || currMonth > 11) {
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear();
            currMonth = date.getMonth();
        } else {
            date = new Date();
        }
        renderCalendar();
    });
});




// Parte relativa al grafico
const ctx = document.getElementById('trainingChart').getContext('2d');

// Funzione per recuperare i dati del numero di giorni di allenamento per ogni mese
const getTrainingDaysPerMonth = () => {
    const trainingDaysPerMonth = [];
    for (let i = 0; i < 12; i++) {
        const month = i + 1; // I mesi partono da 1 in SQL
        const daysInMonth = allenamenti.filter(a => a.mese == month && a.anno == currYear).length;
        trainingDaysPerMonth.push(daysInMonth);
    }
    return trainingDaysPerMonth;
};

// Funzione che crea il grafico
const trainingChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Giorni di Allenamento',
            data: getTrainingDaysPerMonth(),
            backgroundColor: '#EBB000',
            borderColor: '#e6851e',
            borderWidth: 3
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 31 // Numero massimo di giorni in un mese
            }
        }
    }
});


//per il bottone che elimina tutti i giorni di allenamento
document.getElementById("cancellaGiorniAllenamento").addEventListener("click", function() {
    if (confirm("Sei sicuro di voler cancellare tutti i giorni di allenamento?")) {
        $.ajax({
            type: "POST",
            url: "../php/cancellaGiorniAllenamento.php",
            success: function(response) {
                // Aggiorna il grafico o esegui altre azioni necessarie dopo aver cancellato i dati
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Gestisci eventuali errori qui
                console.error(xhr.responseText);
            }
        });
        location.reload();
    }
});