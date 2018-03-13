<h1>Plan zajęć:</h1>
<table>
    <thead>
        <tr>
            <td>Dzień</td>
            <td>Typ zajęć</td>
            <td>Nazwa</td>
            <td>Od</td>
            <td>Do</td>
            <td>Prowadzący</td>
        </tr>
    </thead>
    <tbody>
    <?php
        //Iterate throught lessons.
        foreach ($plan as $key => $lesson) {

            echo '<tr>' .
                '<td>' . $lesson['day'] . ' </td>' .
                '<td>' . $lesson['type'] . ' </td>' .
                '<td>' . $lesson['lesson'] . ' </td>' .
                '<td>' . $lesson['start'] . ' </td>' .
                '<td>' . $lesson['end'] . ' </td>' .
                '<td>' . $lesson['teacher_name'] . '</td>' .
            '</tr>';
        }
    ?>
    </tbody>
</table> 