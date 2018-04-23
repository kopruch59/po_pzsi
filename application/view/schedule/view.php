<div class="info">
    <?php
    echo 'Witaj ' . $_SESSION["test"];
    ?>
</div>

<h1>Plan lekcji</h1>   

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
                if ($lesson['day'] == "Poniedziałek")
                    echo '<tr><td>' .
                    '<span class="hour">' . $lesson['start'] . '-' . $lesson['end'] . '</span><br />' .
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
                if ($lesson['day'] == "Wtorek")
                    echo '<tr><td>' .
                    '<span class="hour">' . $lesson['start'] . '-' . $lesson['end'] . '</span><br />' .
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
    if ($lesson['day'] == "Środa")
        echo '<tr><td>' .
        '<span class="hour">' . $lesson['start'] . '-' . $lesson['end'] . '</span><br />' .
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
    if ($lesson['day'] == "Czwartek")
        echo '<tr><td>' .
        '<span class="hour">' . $lesson['start'] . '-' . $lesson['end'] . '</span><br />' .
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
    if ($lesson['day'] == "Piątek")
        echo '<tr><td>' .
        '<span class="hour">' . $lesson['start'] . '-' . $lesson['end'] . '</span><br />' .
        '<span class="name">' . $lesson['lesson'] . '</span><br />' .
        '<span class="teacher">' . $lesson['teacher_name'] . '</span>' .
        '<span class="spantype">' . $lesson['type'] . '</span></td></tr>';
}
?>

        </table>
    </div>
    <div style="clear:both;"></div>

</div>


<!--<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">-->

<!--                <thead>
        <tr>
            <th>
                Dzień
            </th>
            <th>
                Typ zajęć
            </th>
            <th>
                Nazwa
            </th>
            <th>
                Od
            </th>
            <th>
                Do
            </th>
            <th>
                Prowadzący
            </th>
        </tr>
    </thead>
    <tbody>

        //<?php
//                    foreach ($plan as $key => $lesson) {
//
//                        echo '<tr>' .
//                        '<td>' . $lesson['day'] . ' </td>' .
//                        '<td>' . $lesson['type'] . ' </td>' .
//                        '<td>' . $lesson['lesson'] . ' </td>' .
//                        '<td>' . $lesson['start'] . ' </td>' .
//                        '<td>' . $lesson['end'] . ' </td>' .
//                        '<td>' . $lesson['teacher_name'] . '</td>' .
//                        '</tr>';
//                    }
//                    
?>
    </tbody>-->
<!--class="table table-striped table-bordered"-->
<!--        </div>
</div>
</div>-->