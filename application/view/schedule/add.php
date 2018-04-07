<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">
            <h2>Wprowadź dane dotyczące planu:</h2>
            <form action="" method="post" name="addForm">
                <div id="subject_name">
                    <label for="lessons">Wybierz przedmiot:</label>
                    <select class="form-control" id="lessons" name="subject_name">
                        <?php
                        if (isset($_POST['subject_name'])) {
                            echo "<option value='" . $_POST['subject_name'] . "'>" . $_POST['subject_name'] . "</option>";
                        }
                        foreach ($formData['lessons'] as $row) {

                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <div id="subject_name_error"></div>
                </div>
                <div id="day">
                    <label for="day">Wybierz dzień:</label>
                    <select class="form-control" id="day" name="day">
                        <?php
                        if (isset($_POST['day'])) {
                            echo "<option value='" . $_POST['day'] . "'>" . $_POST['day'] . "</option>";
                        }
                        foreach ($formData['days'] as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <div id="day_error"></div>
                </div>
                <div id="type">
                    <label for="type">Wybierz typ:</label>
                    <select class="form-control" id="type" name="type">
                        <?php
                        if (isset($_POST['type'])) {
                            echo "<option value='" . $_POST['type'] . "'>" . $_POST['type'] . "</option>";
                        }
                        foreach ($formData['types'] as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <div id="type_error"></div>
                </div>
                <div id="start_time">
                    <label for="start">Podaj godzinę rozpoczęcia zajęć:</label>
                    <input class="form-control" type="time" name="start_time" value="<?php
                    if (isset($_POST['start_time'])) {
                        $selectedTime = $_POST['start_time'];
                        $endTime = strtotime($selectedTime) + 900;  //900 = 15 min X 60 sec
                        echo date('H:i:s', $endTime);
                    }
                    ?>" id="start">
                    <div id="start_time_error"></div>
                </div>
                <div id="end_time">
                    <label for="end">Podaj godzinę zakończenia zajęć:</label>
                    <input class="form-control" type="time" name="end_time" value="<?php
                    if (isset($_POST['end_time'])) {
                        $selectedTime = $_POST['end_time'];
                        $endTime = strtotime($selectedTime) + 900;  //900 = 15 min X 60 sec
                        echo date('H:i:s', $endTime);
                    }
                    ?>" id="end">
                    <div id="end_time_error"></div>
                </div>
                <div id="teacher_name">
                    <label for="teacher_name">Podaj nazwisko prowadzącego</label>
                    <input type="text" name="teacher_name" value="<?php if (isset($_POST['teacher_name'])) echo $_POST['teacher_name'] ?>" list="tlist" id="teacher_name" />
                    <datalist id="tlist">
                        <?php
                        foreach ($formData['teacher'] as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </datalist>
                    <div id="teacher_name_error"></div>
                </div>
                <div id="group">
                    <label for="group">Wybierz do której grupy ma być dodane zajęcia:</label>
                    <select name="group">
                        <?php
                        if (isset($_POST['group'])) {
                            echo "<option value='" . $_POST['group'] . "'>" . $_POST['group'] . "</option>";
                        }
                        foreach ($formData['group'] as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <div id="group_error"></div>
                </div>
                <input type="submit" class="btn-primary btn" onclick="return Validate();" value="Dodaj do planu!" name="subbmit" />
                <input type="hidden" value="1" name="save_lesson" />
            </form>
        </div>
    </div>
</div>
