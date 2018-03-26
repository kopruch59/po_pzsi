<h1>Plan lekcji</h1>   
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
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

                    <?php
//        Iterate throught lessons.
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
        </div>
    </div>
</div>
