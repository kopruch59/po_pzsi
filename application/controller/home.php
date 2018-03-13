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
    public function action_index() {
        //Load default header.
        $this->outputHeader();
        //Load this action views.
        require DIR_VIEW . 'home' . DS . 'index.php';
        //Load default footer.
        $this->outputFooter();
    }
}
