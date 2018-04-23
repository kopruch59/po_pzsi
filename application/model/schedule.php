<?php

session_start();

class ScheduleModel extends Model {

    public function getSchedule() {
        $connection = $this->getConnection();
        $group = $_SESSION["group"];
        
        $query = "SELECT * FROM `" . DB_NAME . "`.plan WHERE `group_number` = '$group' order by start";
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
        $url_calendars = 'https://www.googleapis.com/calendar/v3/users/me/calendarList?' . http_build_query($url_parameters);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_calendars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $_SESSION['accessToken']]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
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
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $_SESSION['accessToken'], 'Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
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
        $start_date = filter_input(INPUT_POST, 'start_date');
        $periodicity = filter_input(INPUT_POST, 'periodicity');

        if ($periodicity == "Nie powtarza się") {
            $connection = $this->getConnection();
            $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date'";
            $connection->query($instruction);
        } else if ($periodicity == "Codziennie") {
            $connection = $this->getConnection();
            $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date'";
            $connection->query($instruction);
            $instruction2 = "SELECT expire FROM `" . DB_NAME . "`.groups WHERE name = '$group'";
            $expire = $connection->query($instruction2);
            $row = $expire->fetch();
            $expireData = $row["expire"];
            $counter = "";
            $Date = new DateTime($start_date);
            while ($counter != $expireData) {
                $Date->add(new DateInterval('P1D'));
                $newDate = $Date->format('Y-m-d');
                $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate'";
                $connection->query($instruction);
                $counter = $newDate;
            }
        } else if ($periodicity == "Co tydzień") {
            $connection = $this->getConnection();
            $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date'";
            $connection->query($instruction);
            $instruction2 = "SELECT expire FROM `" . DB_NAME . "`.groups WHERE name = '$group'";
            $expire = $connection->query($instruction2);
            $row = $expire->fetch();
            $expireData = $row["expire"];
            $counter = "";
            $Date = new DateTime($start_date);
            while ($counter <= $expireData) {
                $Date->add(new DateInterval('P7D'));
                $newDate = $Date->format('Y-m-d');
                $counter = $newDate;
                if ($counter <= $expireData) {
                    $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate'";
                    $connection->query($instruction);
                }
            }
        } else if ($periodicity == "Co 2 tygodnie") {
            $connection = $this->getConnection();
            $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date'";
            $connection->query($instruction);
            $instruction2 = "SELECT expire FROM `" . DB_NAME . "`.groups WHERE name = '$group'";
            $expire = $connection->query($instruction2);
            $row = $expire->fetch();
            $expireData = $row["expire"];
            $counter = "";
            $Date = new DateTime($start_date);
            while ($counter <= $expireData) {
                $Date->add(new DateInterval('P14D'));
                $newDate = $Date->format('Y-m-d');
                $counter = $newDate;
                if ($counter <= $expireData) {
                    $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate'";
                    $connection->query($instruction);
                }
            }
        } else if ($periodicity == "Niestandardowe") {
            $imputValue = filter_input(INPUT_POST, 'input_days_value');
            $custom_periodicity_type = filter_input(INPUT_POST, 'custom_periodicity_type');
            $custom_end_date = filter_input(INPUT_POST, 'custom_end_date');
            $connection = $this->getConnection();
            $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date'";
            $connection->query($instruction);
            if ($custom_periodicity_type == "Dzień") {
                $counter = "";
                $Date = new DateTime($start_date);
                $day_value = $imputValue * 1;
                while ($counter <= $custom_end_date) {
                    $Date->add(new DateInterval('P' . $day_value . 'D'));
                    $newDate = $Date->format('Y-m-d');
                    $counter = $newDate;
                    if ($counter <= $custom_end_date) {
                        $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate'";
                        $connection->query($instruction);
                    }
                }
            } else if ($custom_periodicity_type == "Tydzień") {
                $counter = "";
                $Date = new DateTime($start_date);
                $weeks_value = $imputValue * 7;
                while ($counter <= $custom_end_date) {
                    $Date->add(new DateInterval('P' . $weeks_value . 'D'));
                    $newDate = $Date->format('Y-m-d');
                    $counter = $newDate;
                    if ($counter <= $custom_end_date) {
                        $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate'";
                        $connection->query($instruction);
                    }
                }
            }
        }
    }

    public function loadData() {
        $formData = [];
        $formData['lessons'] = $this->fetchLesson();
        $formData['days'] = $this->fetchDay();
        $formData['types'] = $this->fetchType();
        $formData['group'] = $this->fetchGroup();
        $formData['teacher'] = $this->fetchTeacher();
        return $formData;
    }

    private function fetchLesson() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.lessons";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    private function fetchDay() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.days";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    private function fetchType() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.type";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    private function fetchGroup() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.groups";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    private function fetchTeacher() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.teachers";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

}
