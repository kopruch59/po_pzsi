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
    public function index() {
        //Load default header.
        $this->loadHeaderView();
        //Load this action views.
        require 'application/view/home/index.php';
        //Load default footer.
        $this->loadFooterView();
    }
}
