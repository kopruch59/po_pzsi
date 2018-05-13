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
     * @var UserModel User model instance.
     */
    protected $modelUser;
    
    public function __construct(bool $loadModel = true) {
        parent::__construct($loadModel);
        
        $this->modelUser = Model::loadModel('User');
        
        session_name(UserModel::SESSION_NAME);
        session_id(UserModel::SESSION_ID_GOOGLE);
        session_start();

        if (!$this->modelUser->isLoggedIn()) {

            header("Location: " . APPLICATION_URL . 'user/login');
            exit();
        }
    }

    /**
     * Default action for controller.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_index() {
        $this->outputHeader_logged();
        require $this->dirViews . 'index.php';
        $this->outputFooter();
    }

    /**
     * Checking login from database
     * 
     * @deprecated since version 0.7 Using login with Google.
     * 
     * @author skomando <szymonkomander@gmail.com>
     */
    public function action_login() {
        
        //For now is deprecated so redirect to index.
        header("Location: " . APPLICATION_URL . $this->name);
        
        if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
            header("Location: " . APPLICATION_URL . "/schedule/show");
            exit();
        }
        $this->model->checkLogin();

        $this->outputHeader_unlogged();
        require $this->dirViews . 'login.php';
        $this->outputFooter();
    }

    /**
     * Logging out
     * 
     * @deprecated since version 0.7 Using login with Google.
     * 
     * @author mgrytz
     */
    public function action_logout() {
        
        //For now is deprecated so redirect to index.
        header("Location: " . APPLICATION_URL . $this->name);
        
        $this->model->logout();
    }
}
