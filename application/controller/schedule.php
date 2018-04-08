<?php

class ScheduleController extends Controller {

    /**
     * @var ScheduleModel Default model for this controller. 
     */
    protected $model;
    
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
        //Load default header.
        $this->outputHeader();
        //Query to DataBase
        $formData = $this->model->loadData();
        //Load this action views.
        require $this->dirViews . 'add.php';
        //Load default footer.
        $this->outputFooter();
    }

     /**
     * action for display table
     * 
     * @author Tomasz <t.kusiek@gmail.com>
     */
    public function action_show() {
        //Load default header.
        $this->outputHeader();
        
        $plan = $this->model->getSchedule();
        //Load this action views.
        require  $this->dirViews . 'view.php';
        //Load default footer.
        $this->outputFooter();
    }

}
