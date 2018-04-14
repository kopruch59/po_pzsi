<?php

class ScheduleController extends Controller {

    /**
     * @var ScheduleModel Default model for this controller. 
     */
    protected $model;

    public function __construct(bool $loadModel = true) {
        parent::__construct($loadModel);

        if (!isset($_SESSION['zalogowany'])) {

            header("Location: " . APPLICATION_URL . "/home/login");
            exit();
        }
    }

    /**
     * Default action for schedule
     * 
     * @author skomando <szymonkomander@gmail.com>
     */
    public function action_index() {
        //Load default header.
        $this->outputHeader();
        //Load this action views.
        require $this->dirViews . 'index.php';
        //Load default footer.
        $this->outputFooter();
    }

    public function action_insertSample() {

        $this->outputHeader();

        echo $this->model->insertSampleToGoogleCalendar();

        $this->outputFooter();
    }

    /**
     * Add action for schedule
     * 
     * @author skomando <szymonkomander@gmail.com>
     */
    public function action_add() {
        $formSubmitted = filter_input(INPUT_POST, 'save_lesson');
        if ($formSubmitted == 1) {
            $this->model->saveSchedule([]);
        }
        $this->outputHeader_logged();
        $formData = $this->model->loadData();
        require $this->dirViews . 'add.php';
        $this->outputFooter();
    }

    /**
     * action for display table
     * 
     * @author Tomasz <t.kusiek@gmail.com>
     */
    public function action_show() {
        $this->outputHeader_logged();
        $plan = $this->model->getSchedule();
        require $this->dirViews . 'view.php';
        $this->outputFooter();
    }

}
