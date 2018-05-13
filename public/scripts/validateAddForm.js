// SELECTING ALL TEXT ELEMENTS
var subject_name = document.forms['addForm']['id_subject_name'];
var day = document.forms['addForm']['id_day'];
var type = document.forms['addForm']['id_type'];
var start_time = document.forms['addForm']['id_start_time'];
var end_time = document.forms['addForm']['id_end_time'];
var teacher_name = document.forms['addForm']['id_teacher_name'];
var group = document.forms['addForm']['id_group'];
var periodicity = document.forms['addForm']['id_periodicity'];
var start_date = document.forms['addForm']['id_start_date'];

// SELECTING ALL ERROR DISPLAY ELEMENTS
var subject_name_error = document.getElementById('subject_name_error');
var day_error = document.getElementById('day_error');
var type_error = document.getElementById('type_error');
var start_time_error = document.getElementById('start_time_error');
var end_time_error = document.getElementById('end_time_error');
var teacher_name_error = document.getElementById('teacher_name_error');
var group_error = document.getElementById('group_error');
var start_date_error = document.getElementById('id_start_date_error');

// SETTING ALL EVENT LISTENERS
subject_name.addEventListener('blur', subjectNameVerify, true);
day.addEventListener('blur', dayVerify, true);
type.addEventListener('blur', typeVerify, true);
start_time.addEventListener('blur', startTimeVerify, true);
end_time.addEventListener('blur', endTimeVerify, true);
teacher_name.addEventListener('blur', teacherNameVerify, true);
group.addEventListener('blur', groupVerify, true);
periodicity.addEventListener('blur', periodicityVerify, true);
start_date.addEventListener('blur', startDateVerify, true);

// validation function
function Validate() {
    if (subject_name.value == "") {
        subject_name.style.border = "1px solid red";
        document.getElementById('subject_name').style.color = "red";
        subject_name_error.textContent = "Pole wybierz przedmiot jest wymagane!";
        subject_name.focus();
        return false;
    }
    if (day.value == "") {
        day.style.border = "1px solid red";
        document.getElementById('day').style.color = "red";
        day_error.textContent = "Pole wybierz dzień jest wymagane!";
        day.focus();
        return false;
    }
    if (type.value == "") {
        type.style.border = "1px solid red";
        document.getElementById('type').style.color = "red";
        type_error.textContent = "Pole wybierz typ jest wymagane!";
        type.focus();
        return false;
    }
    if (start_time.value == "") {
        start_time.style.border = "1px solid red";
        document.getElementById('start_time').style.color = "red";
        start_time_error.textContent = "Pole godzina rozpoczęcia jest wymagana!";
        start_time.focus();
        return false;
    }
    if (start_date.value == "") {
        start_date.style.border = "1px solid red";
        document.getElementById('start_date_time').style.color = "red";
        start_date_error.textContent = "Te pole jest wymagane!";
        start_date.focus();
        return false;
    }
    if (end_time.value == "") {
        end_time.style.border = "1px solid red";
        document.getElementById('end_time').style.color = "red";
        end_time_error.textContent = "Pole godzina zakończenia jest wymagana!";
        end_time.focus();
        return false;
    }
    if (teacher_name.value == "") {
        teacher_name.style.border = "1px solid red";
        document.getElementById('teacher_name').style.color = "red";
        teacher_name_error.textContent = "Pole nazwisko prowadzącego jest wymagane!";
        teacher_name.focus();
        return false;
    }
    if (group.value == "") {
        group.style.border = "1px solid red";
        document.getElementById('group').style.color = "red";
        group_error.textContent = "Pole grupa jest wymagane!";
        group.focus();
        return false;
    }
}
function subjectNameVerify() {
    if (subject_name.value != "") {
        subject_name.style.border = "1px solid #5e6e66";
        document.getElementById('subject_name').style.color = "#5e6e66";
        subject_name_error.innerHTML = "";
        return true;
    }
}
function dayVerify() {
    if (day.value != "") {
        day.style.border = "1px solid #5e6e66";
        document.getElementById('day').style.color = "#5e6e66";
        day_error.innerHTML = "";
        return true;
    }
}
function typeVerify() {
    if (type.value != "") {
        type.style.border = "1px solid #5e6e66";
        document.getElementById('type').style.color = "#5e6e66";
        type_error.innerHTML = "";
        return true;
    }
}
function startTimeVerify() {
    if (start_time.value != "") {
        start_time.style.border = "1px solid #5e6e66";
        document.getElementById('start_time').style.color = "#5e6e66";
        start_time_error.innerHTML = "";
        return true;
    }
}
function endTimeVerify() {
    if (end_time.value != "") {
        end_time.style.border = "1px solid #5e6e66";
        document.getElementById('end_time').style.color = "#5e6e66";
        end_time_error.innerHTML = "";
        return true;
    }
}
function teacherNameVerify() {
    if (teacher_name.value != "") {
        teacher_name.style.border = "1px solid #5e6e66";
        document.getElementById('teacher_name').style.color = "#5e6e66";
        teacher_name_error.innerHTML = "";
        return true;
    }
}
function groupVerify() {
    if (group.value != "") {
        group.style.border = "1px solid #5e6e66";
        document.getElementById('group').style.color = "#5e6e66";
        group_error.innerHTML = "";
        return true;
    }
}
function startDateVerify() {
    if (start_date.value != "") {
        start_date.style.border = "1px solid #5e6e66";
        document.getElementById('start_date_time').style.color = "#5e6e66";
        start_date_error.innerHTML = "";
        return true;
    }
}
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