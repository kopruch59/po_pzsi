<?php

/**
 * Home controller.
 *
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class HomeController extends Controller {

    /**
     * @var HomeController Default model for this controller. 
     */
    protected $model;

    /**
     * Default action for controller.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_index() {
        $this->outputHeader();
        require $this->dirViews . 'index.php';
        $this->outputFooter();
    }

    /**
     * Checking login from database
     * 
     * @author skomando <szymonkomander@gmail.com>
     */
    public function action_login() {
        if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
            header("Location: " . APPLICATION_URL . "/schedule/show");
            exit();
        }
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
    public function action_logout() {
        $this->model->Logout();
    }

}
