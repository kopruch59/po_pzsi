<h1>Wprowadź dane dotyczące planu:</h1>
<form action="" method="post">

    <label for="subject_name">Wybierz przedmiot:</label>
    <select name="subject_name">
        <option name="subject_name"><?php
            foreach ($fetchLesson as $row) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </option> 
    </select>
    <br/><br/>
    <label for="day">Wybierz dzień:</label>
    <select name="day">
        <option name="day"><?php
            foreach ($fetchDay as $row) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </option>
    </select>
    <br/><br/>
    <label for="type">Wybierz typ zajęć:</label>
    <select name="type">
        <option name="type"><?php
            foreach ($fetchType as $row) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </option> 
    </select>
    <br/><br/>
    <label for="start_time">Podaj godzinę rozpoczęcia zajęć</label>
    <input type="datetime-local" name="start_time"/>
    <br/><br/>
    <label for="end_time">Podaj godzinę zakończenia zajęć</label>
    <input type="datetime-local" name="end_time"/>
    <br/><br/>
    <label for="first_name">Podaj nazwisko prowadzącego</label>
    <input type="text" name="teacher_name"/>
    <br/><br/>
    <input type="submit" value="Dodaj do planu!" name="subbmit"/>

</form>

