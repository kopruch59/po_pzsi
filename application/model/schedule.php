<?php

session_start();

class ScheduleModel extends Model {

    public function getSchedule() {
        $connection = $this->getConnection();
        $group = $_SESSION["group"];
        $query = "SELECT * FROM `" . DB_NAME . "`.plan WHERE `group_number` = '$group' order by day, start";
        $queryPrepare = $connection->prepare($query);
        $queryPrepare->execute();
        $schedule = $queryPrepare->fetchAll();

        return $schedule;
    }

    public function saveSchedule(array $formData) {

        $start_time = filter_input(INPUT_POST, 'start_time');
        $end_time = filter_input(INPUT_POST, 'end_time');
        $subject_name = filter_input(INPUT_POST, 'subject_name');
        $teacher_name = filter_input(INPUT_POST, 'teacher_name');
        $day = filter_input(INPUT_POST, 'day');
        $type = filter_input(INPUT_POST, 'type');
        $group = filter_input(INPUT_POST, 'group');

        //Protection for MySQL Injection
        $start_time = htmlentities($start_time, ENT_QUOTES, "UTF-8");
        $end_time = htmlentities($end_time, ENT_QUOTES, "UTF-8");
        $subject_name = htmlentities($subject_name, ENT_QUOTES, "UTF-8");
        $teacher_name = htmlentities($teacher_name, ENT_QUOTES, "UTF-8");
        $day = htmlentities($day, ENT_QUOTES, "UTF-8");
        $type = htmlentities($type, ENT_QUOTES, "UTF-8");
        $group = htmlentities($group, ENT_QUOTES, "UTF-8");

        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group' ";
        $connection->query($instruction);
    }

    //Loads all data from database
    public function loadData() {
        $formData = [];
        $formData['lessons'] = $this->fetchLesson();
        $formData['days'] = $this->fetchDay();
        $formData['types'] = $this->fetchType();
        $formData['group'] = $this->fetchGroup();
        $formData['teacher'] = $this->fetchTeacher();
        return $formData;
    }

    //Fetching lessons from database
    private function fetchLesson() {
        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.lessons";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    //Fetching days from database
    private function fetchDay() {
        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.days";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    //Fetching type from database
    private function fetchType() {
        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.type";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    //Fetching group from database
    private function fetchGroup() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.groups";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    
     //Fetching teachers from database
    private function fetchTeacher() {
        //Connection and query to MySQL
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.teachers";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
