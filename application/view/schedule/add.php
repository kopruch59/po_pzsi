<?php
    if (!isset($_SESSION['zalogowany']))
	{
		header("Location: " . APPLICATION_URL . "/home/login");
		exit();
	}
	
?>

<div class="info">
<?php
    echo 'Witaj '. $_SESSION["test"];
?>
</div>

<div class="container">
    <div class="row">
        <h1>Wprowadź dane dotyczące planu:</h1>
        <div class="form-group">
            <div class="text-center">
                <div class="col-md-4 order-md-4 mb-4">

                    <form action="" method="post">

                        <label for="lessons">Wprowadź nazwę przedmiotu:</label>
                        <input type="text" name="lesson" list="llist" id="lesson" class="planinput"/>
                            <datalist id="llist">
                                <option name="lesson">
                                    <?php
                                    foreach ($formData['lessons'] as $row) 
                                        {
                                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                        }
                                    ?>
                                </option>
                            </datalist>
                        <br />
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
                    <input class="planinput" type="text" name="teacher_name" value="<?php if (isset($_POST['teacher_name'])) echo $_POST['teacher_name'] ?>" list="tlist" id="teacher_name" />
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
