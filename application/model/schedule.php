<?php

class ScheduleModel extends Model {

    public function saveSchedule(array $formData) {

        $start_time = filter_input(INPUT_POST, 'start_time');
        $end_time = filter_input(INPUT_POST, 'end_time');
        $subject_name = filter_input(INPUT_POST, 'subject_name');
        $teacher_name = filter_input(INPUT_POST, 'teacher_name');
        $day = filter_input(INPUT_POST, 'day');
        $type = filter_input(INPUT_POST, 'type');

        //Protection for MySQL Injection
        $start_time = htmlentities($start_time, ENT_QUOTES, "UTF-8");
        $end_time = htmlentities($end_time, ENT_QUOTES, "UTF-8");
        $subject_name = htmlentities($subject_name, ENT_QUOTES, "UTF-8");
        $teacher_name = htmlentities($teacher_name, ENT_QUOTES, "UTF-8");
        $day = htmlentities($day, ENT_QUOTES, "UTF-8");
        $type = htmlentities($type, ENT_QUOTES, "UTF-8");

        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "INSERT INTO " . DB_NAME . ".plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type' ";
        $connection->query($instruction);
    }

    //Fetching lessons from database
    public function fetchLesson(array $formData) {
        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM " . DB_NAME . ".lessons";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    //Fetching days from database
    public function fetchDay(array $formData) {
        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM " . DB_NAME . ".days";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    //Fetching type from database
    public function fetchType(array $formData) {
        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM " . DB_NAME . ".type";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

}
