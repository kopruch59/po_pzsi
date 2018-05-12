<?php
if (!isset($_POST['week'])) {
    $week = date('Y-m-d', time());
    
} else {
    $week = $_POST['week'];
}
$Date = new DateTime($week);
$Date1 = new DateTime($week);
$Date1->modify('+6 day');

?>
<div id="interval">
    <?php
    echo "<h3>" . $Date->format('d-m') . " - " . $Date1->format('d-m') . "</h3>";
    ?>
</div>
<div id="choice">
    <form action="" method="post">
        <label for="monday">Wybierz początek tygodnia:</label>
        <select id="week" name="week" onchange="this.form.submit()" onchange="options[selectedIndex].value&&self.location.reload(true)">
            <?php
            foreach ($formmondays['dates'] as $row) {
                echo "<option value='" . $row['date'] . "'>".'Tydz '.$row['week_number'].': '. $row['date'] . "</option>";
            }
            ?>
        </select>
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
                if (($lesson['day'] == "Poniedziałek") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<div id="spanBold"><span class="startDateSpan">' . $lesson['start_date'] . '</span></div>' .
                    '<span class="time">' . substr($lesson['start'],0,5) . ' - ' . substr($lesson['end'],0,5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><button onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" type="button" class="btn btn-success eventButton" data-toggle="modal" data-target="#addEvent">Dodaj wydarzenie!</button></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
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
                if (($lesson['day'] == "Wtorek") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<div id="spanBold"><span class="startDateSpan">' . $lesson['start_date'] . '</span></div>' .
                    '<span class="time">' . substr($lesson['start'],0,5) . ' - ' . substr($lesson['end'],0,5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><button onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" type="button" class="btn btn-success eventButton" data-toggle="modal" data-target="#addEvent">Dodaj wydarzenie!</button></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
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
                if (($lesson['day'] == "Środa") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<div id="spanBold"><span class="startDateSpan">' . $lesson['start_date'] . '</span></div>' .
                    '<span class="time">' . substr($lesson['start'],0,5) . ' - ' . substr($lesson['end'],0,5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><button onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" type="button" class="btn btn-success eventButton" data-toggle="modal" data-target="#addEvent">Dodaj wydarzenie!</button></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
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
                if (($lesson['day'] == "Czwartek") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<div id="spanBold"><span class="startDateSpan">' . $lesson['start_date'] . '</span></div>' .
                    '<span class="time">' . substr($lesson['start'],0,5) . ' - ' . substr($lesson['end'],0,5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><button onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" type="button" class="btn btn-success eventButton" data-toggle="modal" data-target="#addEvent">Dodaj wydarzenie!</button></div></td></tr>';
                    settype($_SESSION['subbmitedBtn'], "integer");
                }
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
                if (($lesson['day'] == "Piątek") && ($lesson['start_date'] >= ($Date->format('Y-m-d'))) && ($lesson['start_date'] <= ($Date1->format('Y-m-d')))) {
                    echo '<tr><td>' .
                    '<div id="spanBold"><span class="startDateSpan">' . $lesson['start_date'] . '</span></div>' .
                    '<span class="time">' . substr($lesson['start'],0,5) . ' - ' . substr($lesson['end'],0,5) . '</span>' .
                    '<span class="float-right-span">' . $lesson['room'] . '</span><br />' .
                    '<span>' . $lesson['lesson'] . '</span><br />' .
                    '<span>' . $lesson['teacher_name'] . '</span>' .
                    '<span class="float-right-span">' . $lesson['type'] . '</span></br>' .
                    '<div id="spanBold"><span class="eventsHeader">Wydarzenia:</span></div></br>' .
                    '<div id="eventButton"><button onclick="' . $_SESSION['subbmitedBtn'] = $lesson['id'] . '" type="button" class="btn btn-success eventButton" data-toggle="modal" data-target="#addEvent">Dodaj wydarzenie!</button></div></td></tr>';
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
                <div class="modal-body">
                    <form action="" method="POST" name="addEventForm">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nazwa wydarzenia:</label>
                            <input type="text" class="form-control" name="event-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Opis:</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Zamknij">
                        <input type="submit" class="btn btn-success" value="Dodaj">
                    </form>
                </div>
            </div>
        </div>
    </div>
