<h1>Wprowadź dane dotyczące planu:</h1>
<form action="" method="post">
    <label for="day">Podaj dzień tygodnia zajęć</label>
    <input type="text" name="day"/>
    <br/><br/>
    <label for="start_time">Podaj godzinę rozpoczęcia zajęć</label>
    <input type="datetime-local" name="start_time"/>
    <br/><br/>
    <label for="end_time">Podaj godzinę zakończenia zajęć</label>
    <input type="datetime-local" name="end_time"/>
    <br/><br/>
    <label for="subject_name">Podaj nazwę przedmiotu</label>
    <input type="text" name="subject_name"/>
    <br/><br/>
    <label for="first_name">Podaj imię prowadzącego zajęcia</label>
    <input type="text" name="first_name"/>
    <br/><br/>
    <label for="last_name">Podaj nazwisko prowadzącego zajęcia</label>
    <input type="text" name="last_name"/>
    <br/><br/>
    <label for="type">Podaj typ zajęć</label>
    <input type="text" name="type"/>
    <br/><br/>
    <input type="submit" value="Dodaj do planu!" name="subbmit"/>
    <input type="hidden" value="1" name="save_lesson" />
</form>

