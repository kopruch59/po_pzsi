<?php
if (isset($_POST['week'])) {
    $week = $_POST['week'];
} else if (isset($_COOKIE['studentSchedule_scheduleWeek'])) {
    $week = $_COOKIE['studentSchedule_scheduleWeek'];
} else {
    $week = date('Y-m-d', time());
}

$Date = new DateTime($week);
$Date1 = new DateTime($week);
$Date1->modify('+6 day');
?>
<div class="container">
<div id="interval">
    <?php
    echo "<h3>" . $Date->format('d-m') . " - " . $Date1->format('d-m') . "</h3>";
    ?>
</div>
<div id="choice">
    <form action="" method="post">
        <label for="monday">Wybierz początek tygodnia:</label>
        <select id="week" name="week" onchange="this.form.submit()" onchange="options[selectedIndex].value && self.location.reload(true)">
            <?php
            foreach ($formmondays['dates'] as $row) {
                $selected = ($row['date'] == $week) ? 'selected' : '';
                echo "<option value='" . $row['date'] . "' " . $selected . ">" . 'Tydz ' . $row['week_number'] . ': ' . $row['date'] . "</option>";
            }
            ?>
        </select>
    </form>
</div>

<div style="clear:both;"></div>
<div id="tabels">
    <div class="table_left" id="Monday">
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
                if (($lesson['day'] == "Poniedziałek") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<span class="time">' . substr($lesson['start'], 0, 5) . ' - ' . substr($lesson['end'], 0, 5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><img title="Dodaj wydarzenie!" height="30" width="30" src="../public/pictures/addEventIcon.png" onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" data-toggle="modal" data-target="#addEvent"></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
            }
            ?>
        </table>
    </div>
    <div class="table_left" id="Tuesday">
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
                if (($lesson['day'] == "Wtorek") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<span class="time">' . substr($lesson['start'], 0, 5) . ' - ' . substr($lesson['end'], 0, 5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><img title="Dodaj wydarzenie!" height="30" width="30" src="../public/pictures/addEventIcon.png" onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" data-toggle="modal" data-target="#addEvent"></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
            }
            ?>
        </table>
    </div>
    <div class="table_left" id="Wednesday">
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
                if (($lesson['day'] == "Środa") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<span class="time">' . substr($lesson['start'], 0, 5) . ' - ' . substr($lesson['end'], 0, 5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><img title="Dodaj wydarzenie!" height="30" width="30" src="../public/pictures/addEventIcon.png" onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" data-toggle="modal" data-target="#addEvent"></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
            }
            ?>
        </table>
    </div>
    <div class="table_left" id="Thursday">
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
                if (($lesson['day'] == "Czwartek") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<span class="time">' . substr($lesson['start'], 0, 5) . ' - ' . substr($lesson['end'], 0, 5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><img title="Dodaj wydarzenie!" height="30" width="30" src="../public/pictures/addEventIcon.png" onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" data-toggle="modal" data-target="#addEvent"></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
            }
            ?>
        </table>
    </div>
    <div class="table_left" id="Friday">
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
                if (($lesson['day'] == "Piątek") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<span class="time">' . substr($lesson['start'], 0, 5) . ' - ' . substr($lesson['end'], 0, 5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><img title="Dodaj wydarzenie!" height="30" width="30" src="../public/pictures/addEventIcon.png" onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" data-toggle="modal" data-target="#addEvent"></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
            }
            ?>
        </table>
    </div>
    <div style="clear:both;"></div>
    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj wydarzenie!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="left">
                    <form action="" method="POST" name="addEventForm">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nazwa wydarzenia:</label>
                            <input type="text" class="form-control" name="event-name" required="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Opis:</label>
                            <textarea class="form-control" id="description" name="description" required=""></textarea>
                        </div>
                        <div class="modal-footer" align="right">
                            <input type="submit" class="btn btn-success" value="Dodaj">
                            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Zamknij">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
