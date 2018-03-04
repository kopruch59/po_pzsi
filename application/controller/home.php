<?php
/**
 * Home controller.
 *
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class Home extends Controller {

    /**
     * Default action for controller.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function actionIndex() {
        //Load default header.
        $this->outputHeader();
        //Load this action views.
        require DIR_VIEW . 'home' . DS . 'index.php';
        //Load default footer.
        $this->outputFooter();
    }

    /**
     * action for discplay table
     * 
     * @author Tomasz <t.kusiek@gmail.com>
     */
    public function actionSchedule() {
        //Load default header.
        $this->loadHeaderView();
        //Load this action views.
        require  DIR_VIEW . 'home' . DS . 'schedule.php';
        //Load default footer.
        $this->loadFooterView();
    }
}
