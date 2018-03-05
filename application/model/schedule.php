<?php

class ScheduleModel extends Model {

    public function saveSchedule(array $formData) {

        $day = filter_input(INPUT_POST, 'day');
        $start_time = filter_input(INPUT_POST, 'start_time');
        $end_time = filter_input(INPUT_POST, 'end_time');
        $subject_name = filter_input(INPUT_POST, 'subject_name');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $type = filter_input(INPUT_POST, 'type');

        $connection = $this->getConnection();

        $instruction = "INSERT INTO " . DB_NAME . ".lessons SET name='$subject_name', start='$start_time', end='$end_time',first_name='$first_name', last_name='$last_name' ";
        $connection->query($instruction);
    }

}
