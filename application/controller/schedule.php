<?php

class Schedule extends Controller {
    
    
    public function __construct() {
        require_once DIR_MODEL . 'schedule.php';
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
        require DIR_VIEW . 'schedule' . DS . 'index.php';
        //Load default footer.
        $this->outputFooter();
    }
    
    /**
     * Add action for schedule
     * 
     * @author skomando <szymonkomander@gmail.com>
     */
    public function action_add() {
        //Load default header.
        $this->outputHeader();
        
        $x = filter_input(INPUT_POST, 'save_lesson');
        
        if($x == 1){
            $model = new ScheduleModel();
            $model->saveSchedule([]);
        }
        //Load this action views.
        require DIR_VIEW . 'schedule' . DS . 'add.php';
        //Load default footer.
        $this->outputFooter();
    }
        /**
     * action for discplay table
     * 
     * @author Tomasz <t.kusiek@gmail.com>
     */
    public function action_show() {
        //Load default header.
        $this->outputHeader();
        $model = new ScheduleModel();
        $plan = $model->getSchedule();
        //Load this action views.
        require  DIR_VIEW . 'schedule' . DS . 'view.php';
        //Load default footer.
        $this->outputFooter();
    }
}

