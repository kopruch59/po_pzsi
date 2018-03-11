<table>
    <thead>
        <tr>
            <td>Dzień</td>
            <td>typ zajęć</td>
            <td>nazwa</td>
            <td>od</td>
            <td>do</td>
            <td>prowadzący</td>
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