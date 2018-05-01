<?php
    if (!isset($_POST['week']))
    {
        $week="2018-01-01";
    }
    else
    {
    $week = $_POST['week'];
    }
    $Date = new DateTime($week);
    $Date1 = new DateTime($week);
    $Date1->modify('+6 day');
    
   
?>

<div id="interval">
<?php
     echo "<h3>".$Date->format('d-m-Y')." - ".$Date1->format('d-m-Y')."</h3>";
?>
</div>

<div id="choice">
    <form action="" method="post">
        <label for="monday">Wybierz początek tygodnia:</label>
        <select name="week">
            <?php
            foreach ($formmondays['mondays'] as $row) 
            {
                echo "<option value='" . $row['date'] . "'>" . $row['date'] . "</option>";
            }
            ?>
        </select>
        <br />
        <input type="submit" value="Potwierdź" />
    </form>
</div>


<div style="clear:both;"></div>

<div id="tabels">
    <div class="table_left">
        <table>
            <thead>
                <tr>
                    <th>
                        Poniedziałek
                    </th>
                </tr>
            </thead>
            <?php
            foreach ($plan as $key => $lesson) {
                if (($lesson['day'] == "Poniedziałek") && ($lesson['start_date']>=($Date->format('Y-m-d'))) && ($lesson['start_date']<=($Date1->format('Y-m-d'))))
                    echo '<tr><td>' .
                    '<span class="hour">' . $lesson['start'] . ' - ' . $lesson['end'] . '</span><br />' .
                    '<span class="name">' . $lesson['lesson'] . '</span><br />' .
                    '<span class="teacher">' . $lesson['teacher_name'] . '</span>' .
                    '<span class="spantype">' . $lesson['type'] . '</span></td></tr>';
            }
            ?>

        </table>
    </div>
    <div class="table_left">
        <table>
            <thead>
                <tr>
                    <th>
                        Wtorek
                    </th>
                </tr>
            </thead>

            <?php
            foreach ($plan as $key => $lesson) {
                if (($lesson['day'] == "Wtorek") && ($lesson['start_date']>=($Date->format('Y-m-d'))) && ($lesson['start_date']<=($Date1->format('Y-m-d'))))
                    echo '<tr><td>' .
                    '<span class="hour">' . $lesson['start'] . ' - ' . $lesson['end'] . '</span><br />' .
                    '<span class="name">' . $lesson['lesson'] . '</span><br />' .
                    '<span class="teacher">' . $lesson['teacher_name'] . '</span>' .
                    '<span class="spantype">' . $lesson['type'] . '</span></td></tr>';
            }
            ?>

        </table>
    </div>

    <div class="table_left">
        <table>
            <thead>
                <tr>
                    <th>
                        Środa
                    </th>
                </tr>
            </thead>

<?php
foreach ($plan as $key => $lesson) {
                if (($lesson['day'] == "Środa") && ($lesson['start_date']>=($Date->format('Y-m-d'))) && ($lesson['start_date']<=($Date1->format('Y-m-d'))))
                    echo '<tr><td>' .
                    '<span class="hour">' . $lesson['start'] . ' - ' . $lesson['end'] . '</span><br />' .
                    '<span class="name">' . $lesson['lesson'] . '</span><br />' .
                    '<span class="teacher">' . $lesson['teacher_name'] . '</span>' .
                    '<span class="spantype">' . $lesson['type'] . '</span></td></tr>';
            }
            ?>

        </table>
    </div>

    <div class="table_left">

        <table>
            <thead>
                <tr>
                    <th>
                        Czwartek
                    </th>
                </tr>
            </thead>

<?php
foreach ($plan as $key => $lesson) {
                if (($lesson['day'] == "Czwartek") && ($lesson['start_date']>=($Date->format('Y-m-d'))) && ($lesson['start_date']<=($Date1->format('Y-m-d'))))
                    echo '<tr><td>' .
                    '<span class="hour">' . $lesson['start'] . ' - ' . $lesson['end'] . '</span><br />' .
                    '<span class="name">' . $lesson['lesson'] . '</span><br />' .
                    '<span class="teacher">' . $lesson['teacher_name'] . '</span>' .
                    '<span class="spantype">' . $lesson['type'] . '</span></td></tr>';
            }
            ?>

        </table>
    </div>

    <div class="table_left">

        <table>
            <thead>
                <tr>
                    <th>
                        Piątek
                    </th>
                </tr>
            </thead>

<?php
foreach ($plan as $key => $lesson) {
                if (($lesson['day'] == "Piątek") && ($lesson['start_date']>=($Date->format('Y-m-d'))) && ($lesson['start_date']<=($Date1->format('Y-m-d'))))
                    echo '<tr><td>' .
                    '<span class="hour">' . $lesson['start'] . ' - ' . $lesson['end'] . '</span><br />' .
                    '<span class="name">' . $lesson['lesson'] . '</span><br />' .
                    '<span class="teacher">' . $lesson['teacher_name'] . '</span>' .
                    '<span class="spantype">' . $lesson['type'] . '</span></td></tr>';
            }
            ?>

        </table>
    </div>
    <div style="clear:both;"></div>

</div>