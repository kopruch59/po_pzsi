<?php

/**
 * Home controller.
 *
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class HomeController extends Controller {

    /**
     * Default action for controller.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
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
     * Checking login from database
     * 
     * @author skomando <szymonkomander@gmail.com>
     */
    public function action_login() {
        
        $this->model->checkLogin();

        $this->outputHeader();
        require $this->dirViews . 'login.php';
        $this->outputFooter();
    }
    
    /**
     * Logging out
     * 
     * @author mgrytz
     */
    public function action_logout() 
    {
        $this->model->Logout();

        $this->outputHeader();
        require $this->dirViews . 'logout.php';
        $this->outputFooter();
    }

}
