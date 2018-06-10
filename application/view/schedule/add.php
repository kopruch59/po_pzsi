<div class="container" style="margin-top: 60px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">
            <h2 class="addHeader">Wprowadź dane dotyczące planu:</h2>
            <form action="" method="post" name="addForm">
                <div id="subject_name">
                    <label for="lessons">Wprowadź nazwę przedmiotu:</label>
                    <input class="planinput form-control modifySelect" id="id_subject_name" type="text" name="subject_name" value="<?php if (isset($_POST['subject_name'])) echo $_POST['subject_name'] ?>" list="slist"/>
                    <datalist id="slist">
                        <?php
                        foreach ($formData['lessons'] as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </datalist>
                    <div id="subject_name_error"></div>
                </div>
                <div id="day">
                    <label for="day">Wybierz dzień:</label>
                    <select class="form-control modifySelect" id="id_day" name="day">
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
                    <select class="form-control modifySelect" id="id_type" name="type">
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
                    <input class="form-control modifySelect" id="id_start_time" type="time" name="start_time" value="<?php
                    if (isset($_POST['start_time'])) {
                        $selectedTime = $_POST['start_time'];
                        $endTime = strtotime($selectedTime) + 3600;
                        echo date('H:i:s', $endTime);
                    }
                    ?>">
                    <div id="start_time_error"></div>
                </div>
                <div id="start_date_time">
                    <label for="start_date">Podaj datę rozpoczęcia zajęć:</label>
                    <input class="form-control modifySelect" id="id_start_date" type="date" name="start_date" value="<?php if (isset($_POST['start_date'])) echo $_POST['start_date'] ?>">
                    <div id="id_start_date_error"></div>
                </div>
                <div id="end_time">
                    <label for="end">Podaj godzinę zakończenia zajęć:</label>
                    <input class="form-control modifySelect" id="id_end_time" type="time" name="end_time" value="<?php
                    if (isset($_POST['end_time'])) {
                        $selectedTime = $_POST['end_time'];
                        $endTime = strtotime($selectedTime) + 3600;
                        echo date('H:i:s', $endTime);
                    }
                    ?>" id="end">
                    <div id="end_time_error"></div>
                </div>
                <div id="teacher_name">
                    <label for="teacher_name">Podaj nazwisko prowadzącego:</label>
                    <input class="planinput form-control modifySelect" id="id_teacher_name" type="text" name="teacher_name" value="<?php if (isset($_POST['teacher_name'])) echo $_POST['teacher_name'] ?>" list="tlist"/>
                    <datalist id="tlist">
                        <?php
                        foreach ($formData['teacher'] as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </datalist>
                    <div id="teacher_name_error"></div>
                </div>
                <div id="room">
                    <label for="room">Sala:</label>
                    <select class="form-control modifySelect" id="id_room" name="room">
                        <?php
                        if (isset($_POST['room'])) {
                            echo "<option value='" . $_POST['room'] . "'>" . $_POST['room'] . "</option>";
                        }
                        foreach ($formData['room'] as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <div id="day_error"></div>
                </div>
                <div id="group">
                    <label for="group">Wybierz do której grupy ma być dodane zajęcia:</label>
                    <select class="form-control modifySelect" id="id_group" name="group">
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
                <div id="periodicity">
                    <label for="periodicity">Cykliczność wydarzenia:</label>;
                    <select class="form-control modifySelect" id="id_periodicity" name="periodicity" onchange="return periodicityVerify();">
                        <?php
                        $options = [$none = "Nie powtarza się", $day = "Codziennie", $week = "Co tydzień", $two_weeks = "Co 2 tygodnie", $custom = "Niestandardowe"];
                        $counter = count($options);
                        for ($i = 0; $i < $counter; $i++) {
                            echo "<option value='" . $options[$i] . "'>" . $options[$i] . "</option>";
                        }
                        ?>
                    </select>
                </div></br>
                <div id="custom_periodicity" style="display: none;">
                    <h4>Powtarzanie niestandardowe</h4>
                    <label for="custom_periodicity">Powtarzaj co:</label> 
                    <input class="form-control modifySelect" type="number" id="inputDaysValue" name="input_days_value" value="1">
                    <select class="form-control modifySelect" id="id_custom_periodicity" name="custom_periodicity_type">
                        <?php
                        $customOptions = [$customDay = "Dzień", $customWeek = "Tydzień"];
                        $customCounter = count($customOptions);
                        for ($i = 0; $i < $customCounter; $i++) {
                            echo "<option value='" . $customOptions[$i] . "'>" . $customOptions[$i] . "</option>";
                        }
                        ?>
                    </select></br>
                    <div id="div_custom_end_date"
                         <label for="custom_periodicity">Koniec powtarzania:</label></br>
                        W dniu <input class="form-control modifySelect" type="date" id="id_custom_end_date" name="custom_end_date"></label></br>
                        <div id="div_custom_end_date_error"></div>
                    </div>
                </div>
                <input type="submit" class="btn-primary btn" onclick="return Validate();" value="Dodaj do planu!" name="subbmit" />
                <input type="hidden" value="1" name="save_lesson" />
            </form>
        </div>
    </div>
</div>
