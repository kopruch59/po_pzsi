var monday = document.getElementById("Monday");
var Tuesday = document.getElementById("Tuesday");
var Wednesday = document.getElementById("Wednesday");
var Thursday = document.getElementById("Thursday");
var Friday = document.getElementById("Friday");
var day = new Date();
var currentDay = day.getDay();

function focusCurrentDay() {
    if(currentDay == "Monday"){
        window.location.hash = '#Monday';
    }
    if(currentDay == "Tuesday"){
        window.location.hash = '#Tuesday';
    } 
    if(currentDay == "Wednesday"){
        window.location.hash = '#Wednesday';
    } 
    if(currentDay == "Thursday"){
        window.location.hash = '#Thursday';
    } 
    if(currentDay == "Friday"){
        window.location.hash = '#Friday';
    } 
}
