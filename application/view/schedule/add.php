<h1>Wprowadź dane dotyczące planu:</h1>
<div class="form-group">

    <form action="" method="post">

        <label for="lessons">Wybierz przedmiot:</label>

        <select class="form-control" id="lessons" name="subject_name"><?php
            foreach ($formData['lessons'] as $row) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </select>
        <label for="day">Wybierz dzień:</label>
        <select class="form-control" id="day" name="day">
            <option name="day"><?php
                foreach ($formData['days'] as $row) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </option>
        </select>
        <label for="type">Wybierz typ:</label>
        <select class="form-control" id="type" name="type">
            <option name="type"><?php
                foreach ($formData['types'] as $row) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </option> 
        </select>
        <label for="start">Podaj godzinę rozpoczęcia zajęć:</label>
        <input class="form-control" type="time" name="start_time" value="" id="start">
        <label for="end">Podaj godzinę zakończenia zajęć:</label>
        <input class="form-control" type="time" name="end_time" value="" id="end">
        <label for="teacher_name">Podaj nazwisko prowadzącego</label>
        <input type="text" name="teacher_name" list="tlist" id="teacher_name"/>
            <datalist id="tlist">
                <option name="teacher"><?php
                foreach ($formData['teacher'] as $row) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
                </option>
            </datalist>
        
        <label for="group">Wybierz do której grupy ma być dodane zajęcia:</label>
        <select name="group">
            <option name="group"><?php
                foreach ($formData['group'] as $row) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </option> 
        </select>
        <input type="submit" value="Dodaj do planu!" name="subbmit"/>
        <input type="hidden" value="1" name="save_lesson" /> 
    </form>
</div>
