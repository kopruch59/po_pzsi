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
    
    /**
     * Inserts sample event to Google calendar logged person.
     * 
     * @return string Message about action.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function insertSampleToGoogleCalendar() {
        
        include_once DIR_MODEL . 'google.php';
        $googleModel = GoogleModel::getInstance();
        $googleModel->client->setAccessToken($_SESSION['accessToken']);
        $googleModel->calendarService = new Google_Service_Calendar($googleModel->client);
        
        $url_parameters = [];
        $url_parameters['fields'] = 'items(id,summary,timeZone)';
        $url_parameters['minAccessRole'] = 'owner';
        $url_calendars = 'https://www.googleapis.com/calendar/v3/users/me/calendarList?'. http_build_query($url_parameters);
        $ch = curl_init();		
        curl_setopt($ch, CURLOPT_URL, $url_calendars);		
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer '. $_SESSION['accessToken']]);	
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
        if ($http_code != 200) {
                throw new Exception('Error : Failed to get calendars list');
        }

        $calendarInfo = $data['items'][0];
        
//        $event = new Google_Service_Calendar_Event([
//            'summary' => 'Sample event x=' . rand(0, 999),
//            'location' => 'LOCATION',
//            'description' => 'HELLO. Mallard is a kind of duck!',
//            'start' => [
//                'date' => '2018-04-11',
//                'timeZone' => $calendarInfo['timeZone'],
//            ],
//            'end' => [
//                'date' => '2018-04-11',
//                'timeZone' => $calendarInfo['timeZone'],
//            ],
//            'recurrence' => [
//                'RRULE:FREQ=DAILY;COUNT=2'
//            ],
//            'attendees' => [
//                array('email' => 'rus@example.com'),
//                array('email' => 'prus@example.com'),
//            ],
//        ]);
//
//      $event = $googleModel->calendarService->events->insert($dupa['id'], $event);
      
        $url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendarInfo['id'] . '/events';
        $curlPost = [
            'summary' => 'Sample event x=' . rand(0, 999),
            'start' => [
                'date' => '2018-04-11',
                'timeZone' => $calendarInfo['timeZone'],
            ],
            'end' => [
                'date' => '2018-04-11',
                'timeZone' => $calendarInfo['timeZone'],
            ],
        ];
        $ch = curl_init();		
        curl_setopt($ch, CURLOPT_URL, $url_events);		
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
        curl_setopt($ch, CURLOPT_POST, 1);		
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer '. $_SESSION['accessToken'], 'Content-Type: application/json']);	
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));	
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
        if ($http_code != 200) {
                throw new Exception('Error : Failed to create event');
        }

        $adupa = $data['id'];
      
      return 'Event created: <a href="' . $data['htmlLink'] . '" target="blank">here</a>';
    }

    public function saveSchedule(array $formData) {

        $start_time = filter_input(INPUT_POST, 'start_time');
        $end_time = filter_input(INPUT_POST, 'end_time');
        $subject_name = filter_input(INPUT_POST, 'subject_name');
        $teacher_name = filter_input(INPUT_POST, 'teacher_name', FILTER_SANITIZE_STRING);
        $day = filter_input(INPUT_POST, 'day');
        $type = filter_input(INPUT_POST, 'type');
        $group = filter_input(INPUT_POST, 'group');

        //Protection for MySQL Injection
//        $start_time = htmlentities($start_time, ENT_QUOTES, "UTF-8");
//        $end_time = htmlentities($end_time, ENT_QUOTES, "UTF-8");
//        $subject_name = htmlentities($subject_name, ENT_QUOTES, "UTF-8");
//        $teacher_name = htmlentities($teacher_name, ENT_QUOTES, "UTF-8");
//        $day = htmlentities($day, ENT_QUOTES, "UTF-8");
//        $type = htmlentities($type, ENT_QUOTES, "UTF-8");
//        $group = htmlentities($group, ENT_QUOTES, "UTF-8");

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
