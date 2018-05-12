var periodicity = document.forms['addForm']['id_periodicity'];
periodicity.addEventListener('blur', periodicityVerify, true);

function periodicityVerify() {
    if (periodicity.value == "Niestandardowe") {
        $(custom_periodicity).css("display", "block");
        document.getElementById("inputDaysValue").setAttribute("required", "true");
        document.getElementById("id_custom_end_date").setAttribute("required", "true");
        document.getElementById("inputDaysValue").setAttribute("min", "1");

        return true;
    } else {
        $(custom_periodicity).css("display", "none");
        document.getElementById("inputDaysValue").removeAttribute("required");
        document.getElementById("id_custom_end_date").removeAttribute("required");
        document.getElementById("inputDaysValue").removeAttribute("min");
        return true;
    }
}