<?php

class ScheduleModel extends Model {

    /**
     * @var string Name of lesson type exercise. 
     */
    const LESSON_TYPE_EXERCISE = 'Ćwiczenia';

    /**
     * @var string Name of lesson type laboratory.
     */
    const LESSON_TYPE_LABORATORY = 'Laboratorium';

    /**
     * @var string Name of lesson type lecture.
     */
    const LESSON_TYPE_LECTURE = 'Wykład';

    /**
     * @var string Name of lesson type project.
     */
    const LESSON_TYPE_PROJECT = 'Projekt';

    /**
     * @var GoogleModel An instance of GoogleModel.
     */
    protected $modelGoogle;

    public function __construct() {
        parent::__construct();

        include DIR_MODEL . 'google.php';
        $this->modelGoogle = GoogleModel::getInstance();
    }

    /**
     * Gets schedule for given group.
     * 
     * @param string $group Group name for which get schedule.
     * @return array Schedule for group.
     * 
     * @editor theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function getSchedule(string $group) {

        $connection = $this->getConnection();

        $query = "SELECT * FROM `" . DB_NAME . "`.plan WHERE `group_number` = '$group' order by start";
        $queryPrepare = $connection->prepare($query);
        $queryPrepare->execute();
        $schedule = $queryPrepare->fetchAll();

        return $schedule;
    }

    /**
     * Saves lesson to database with choosen periodicity.
     * 
     * @param array $formData - loaded data from database.
     */
    public function saveSchedule(array $formData) {

        $start_time = filter_input(INPUT_POST, 'start_time');
        $end_time = filter_input(INPUT_POST, 'end_time');
        $subject_name = filter_input(INPUT_POST, 'subject_name');
        $teacher_name = filter_input(INPUT_POST, 'teacher_name', FILTER_SANITIZE_STRING);
        $day = filter_input(INPUT_POST, 'day');
        $type = filter_input(INPUT_POST, 'type');
        $group = filter_input(INPUT_POST, 'group');
        $start_date = filter_input(INPUT_POST, 'start_date');
        $room = filter_input(INPUT_POST, 'room');
        $periodicity = filter_input(INPUT_POST, 'periodicity');

        $lessonData = [
            'lesson' => $subject_name,
            'start' => $start_time,
            'end' => $end_time,
            'teacher_name' => $teacher_name,
            'type' => $type,
            'group_number' => $group,
            'room' => $room,
            'start_date' => $start_date,
            'color' => $this->getLessonColor($type),
        ];

        if ($periodicity == "Nie powtarza się") {
            $connection = $this->getConnection();
            $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date', room='$room'";
            !$connection->query($instruction) ?: $this->saveGoogleEvent($lessonData);
        } else if ($periodicity == "Codziennie") {
            $connection = $this->getConnection();
            $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date', room='$room'";
            !$connection->query($instruction) ?: $this->saveGoogleEvent($lessonData);
            $instruction2 = "SELECT expire FROM `" . DB_NAME . "`.groups WHERE name = '$group'";
            $expire = $connection->query($instruction2);
            $row = $expire->fetch();
            $expireData = $row["expire"];
            $counter = "";
            $Date = new DateTime($start_date);
            while ($counter != $expireData) {
                $Date->add(new DateInterval('P1D'));
                $newDate = $Date->format('Y-m-d');
                $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate', room='$room'";
                $lessonData['start_date'] = $newDate;
                !$connection->query($instruction) ?: $this->saveGoogleEvent($lessonData);
                $counter = $newDate;
            }
        } else if ($periodicity == "Co tydzień") {
            $countDays = 7;
            $this->setPeriodicity($countDays, $start_time, $end_time, $subject_name, $teacher_name, $day, $type, $group, $start_date, $room, $lessonData);
        } else if ($periodicity == "Co 2 tygodnie") {
            $countDays = 14;
            $this->setPeriodicity($countDays, $start_time, $end_time, $subject_name, $teacher_name, $day, $type, $group, $start_date, $room, $lessonData);
        } else if ($periodicity == "Niestandardowe") {
            $imputValue = filter_input(INPUT_POST, 'input_days_value');
            $custom_periodicity_type = filter_input(INPUT_POST, 'custom_periodicity_type');
            $custom_end_date = filter_input(INPUT_POST, 'custom_end_date');
            $connection = $this->getConnection();
            $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date', room='$room'";
            !$connection->query($instruction) ?: $this->saveGoogleEvent($lessonData);
            if ($custom_periodicity_type == "Dzień") {
                $counter = "";
                $Date = new DateTime($start_date);
                $day_value = $imputValue * 1;
                while ($counter <= $custom_end_date) {
                    $Date->add(new DateInterval('P' . $day_value . 'D'));
                    $newDate = $Date->format('Y-m-d');
                    $counter = $newDate;
                    if ($counter <= $custom_end_date) {
                        $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate', room='$room'";
                        $lessonData['start_date'] = $newDate;
                        !$connection->query($instruction) ?: $this->saveGoogleEvent($lessonData);
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
                        $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate', room='$room'";
                        $lessonData['start_date'] = $newDate;
                        !$connection->query($instruction) ?: $this->saveGoogleEvent($lessonData);
                    }
                }
            }
        }
    }

    /**
     * Functions sets Periodicy.
     */
    public function setPeriodicity($countDays, $start_time, $end_time, $subject_name, $teacher_name, $day, $type, $group, $start_date, $room, $lessonData) {
        $connection = $this->getConnection();
        $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$start_date', room='$room'";
        !$connection->query($instruction) ?: $this->saveGoogleEvent($lessonData);
        $instruction2 = "SELECT expire FROM `" . DB_NAME . "`.groups WHERE name = '$group'";
        $expire = $connection->query($instruction2);
        $row = $expire->fetch();
        $expireData = $row["expire"];
        $counter = "";
        $Date = new DateTime($start_date);
        while ($counter <= $expireData) {
            $Date->add(new DateInterval('P' . $countDays . 'D'));
            $newDate = $Date->format('Y-m-d');
            $counter = $newDate;
            if ($counter <= $expireData) {
                $instruction = "INSERT INTO `" . DB_NAME . "`.plan SET lesson='$subject_name', start='$start_time', end='$end_time',teacher_name='$teacher_name',day='$day',type='$type',group_number='$group', start_date='$newDate', room='$room'";
                $lessonData['start_date'] = $newDate;
                !$connection->query($instruction) ?: $this->saveGoogleEvent($lessonData);
            }
        }
    }

    /**
     * Loading data to $formData[].
     * 
     * @return required data for add-form from database.
     */
    public function loadData() {
        $formData = [];
        $formData['lessons'] = $this->fetchLesson();
        $formData['days'] = $this->fetchDay();
        $formData['types'] = $this->fetchType();
        $formData['group'] = $this->fetchGroup();
        $formData['teacher'] = $this->fetchTeacher();
        $formData['room'] = $this->fetchRoom();
        return $formData;
    }

    /**
     * Saves given lesson data to Google Calendar.
     * 
     * @param array $lessonData Lesson data to save as Google event.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    protected function saveGoogleEvent(array $lessonData) {

        //First check if user allowed to saving into his Google calendar.
        if (!empty($_SESSION['googleUserData'])) {
            if ($_SESSION['googleUserData']['saving_to_google'] != 1) {
                return;
            }
        }

        $startDateTime = new DateTime($lessonData['start_date'] . ' ' . $lessonData['start']);
        $endDateTime = new DateTime($lessonData['start_date'] . ' ' . $lessonData['end']);

        $lessonData['startDateTime'] = $startDateTime->format(DateTime::RFC3339);
        $lessonData['endDateTime'] = $endDateTime->format(DateTime::RFC3339);

        $this->modelGoogle->insertEventIntoGoogleCalendar($lessonData);
    }

    /**
     * Fetching informations about lessons to $rows.
     * 
     * @return informations about lessons from database.
     */
    private function fetchLesson() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.lessons";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Fetching informations about days to $rows.
     * 
     * @return informations about days from database.
     */
    private function fetchDay() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.days";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Fetching informations about types to $rows.
     * 
     * @return informations about types from database.
     */
    private function fetchType() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.type";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Fetching informations about groups to $rows.
     * 
     * @return informations about groups from database.
     */
    private function fetchGroup() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.groups";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Fetching informations about teachers to $rows.
     * 
     * @return informations about teachers from database.
     */
    private function fetchTeacher() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.teachers";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Fetching informations about rooms to $rows.
     * 
     * @return informations about rooms from database.
     */
    private function fetchRoom() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.rooms";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Loading all weeks to $formmondays 
     */
    public function loadmondays() {
        $formmondays = [];
        $formmondays['dates'] = $this->fetchMondaydate();
        return $formmondays;
    }

    /**
     * Getting information from database and save to $rows.
     * 
     * @return all weeks.
     */
    private function fetchMondaydate() {
        $connection = $this->getConnection();
        $instruction = "SELECT * FROM `" . DB_NAME . "`.mondays";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Saves all weeks to $date.
     * 
     * @param array $formmondays
     */
    public function saveMonday(array $formmondays) {
        $date = filter_input(INPUT_POST, 'date');
    }

    /**
     * Saves events to database.
     * 
     * @author skomando <szymonkomander@gmail.com>
     */
    function addEvent() {
        if (!is_null(filter_input(INPUT_POST, 'eventAdd', FILTER_SANITIZE_STRING))) {

            $eventName = filter_input(INPUT_POST, 'event-name', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $idPlan = filter_input(INPUT_POST, 'eventID', FILTER_SANITIZE_STRING);

            $connection = $this->getConnection();

            $query = "INSERT INTO `" . DB_NAME . "`.events SET name='$eventName', description='$description', id_plan='$idPlan'";
            $queryPrepare = $connection->prepare($query);
            $queryPrepare->execute();
            unset($_SESSION['subbmitedBtn']);
        }
    }

    /**
     * Returns color which should be set in Google Calendar Evend for specified lesson type.<br>
     * Colors must refer to colors using by Google.
     * 
     * @param string $lessonType Lesson type - each lesson type has own color.
     * @return string Color in HEX.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    private function getLessonColor(string $lessonType) {

        switch ($lessonType) {
            case self::LESSON_TYPE_EXERCISE:
                $color = '#46d6db';
                break;
            case self::LESSON_TYPE_LABORATORY:
                $color = '#5484ed';
                break;
            case self::LESSON_TYPE_LECTURE:
                $color = '#51b749';
                break;
            case self::LESSON_TYPE_PROJECT:
                $color = '#fbd75b';
                break;
            default:
                $color = '#dbadff';
                break;
        }

        return $color;
    }

}
