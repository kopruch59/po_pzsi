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
                <div class="col-md-4 order-md-2 mb-4">
                    <label for="start">Podaj godzinę rozpoczęcia zajęć:</label>
                    <input class="form-control" type="time" name="start_time" value="" id="start">
                    <label for="end">Podaj godzinę zakończenia zajęć:</label>
                    <input class="form-control" type="time" name="end_time" value="" id="end">
                    <label for="teacher_name">Podaj nazwisko prowadzącego</label>
                    <input type="text" name="teacher_name" list="tlist" id="teacher_name" class="planinput"/>
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
                    <input type="submit" class="btn-primary btn" value="Dodaj do planu!" name="subbmit"/>
                    <input type="hidden" value="1" name="save_lesson" /> 
                </div>
            </div>
        </div>
    </div>
</div>
