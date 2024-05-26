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





const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio",
              "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() ;

        liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;

    document.querySelectorAll(".days li").forEach(day => {
        day.addEventListener("click", (e) => {
            // Remove the background color from any previously selected day
            e.target.classList.toggle("active");
    }); 
    }); 
    document.querySelectorAll(".calendar days li").forEach(day => {
        day.addEventListener("click", (e) => {
            // Remove the background color from any previously selected day
            e.target.classList.toggle("active");
    }); 
    }); 
   
}
renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});

const ctx = document.getElementById('trainingChart').getContext('2d');
            
// Example data: replace with your actual data
const trainingDaysPerMonth = [10
                            , 10
                            , 10
                            , 15
                            , 10
                            , 10
                            , 10
                            , 13
                            , 20
                            , 20
                            , 15
                            , 5]; // Days of training per month

//Funzione che crea il grafico
const trainingChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Giorni di Allenamento',
            data: trainingDaysPerMonth,
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
                max: 31 // Maximum days in a month
            }
        }
    }
});