<?php
/**
 * Class handling application user stuffs.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class UserController extends Controller {
    
    /**
     * @var string Key name for Google access token element.
     */
    const GOOGLE_ACCESS_TOKEN = 'accessToken';
    
    /**
     * @var string Key for field contains Google user data.
     */
    const KEY_GOOGLE_USER_DATA = 'googleUserData';
    
    /**
     * @var string Key name for login method.
     */
    const KEY_LOGIN_METHOD = 'loginMethod';
    
    /**
     * @var string Value for login method Google.
     */
    const VALUE_LOGIN_METHOD_GOOGLE = 'googleLogin';
    
    /**
     * @var UserModel Default model for this controller. 
     */
    protected $model;
    
    /**
     * @var GoogleModel GoogleModel object. 
     */
    protected $modelGoogle;
        
    /**
     * Checks if current user is logged in with Google.
     * 
     * @return boolean TRUE if user is logged in, FALSE otherwise.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public static function isLoggedIn() {
        //Information about user login are stored in $_SESSION variable.
        if (isset($_SESSION[self::GOOGLE_ACCESS_TOKEN]) && !empty($_SESSION[self::GOOGLE_ACCESS_TOKEN])) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Additional initialize Google model.
     * 
     * @param bool $loadModel TRUE if load default model for this controller, FALSE if not load model.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function __construct(bool $loadModel = true) {
        parent::__construct($loadModel);
        
        $this->modelGoogle = Model::loadModel('Google');
        
        session_start();
    }
    
    /**
     * Action for user profile homepage.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_index() {
        
        $this->outputHeader_unlogged();
        require $this->dirViews . 'index.php';
        $this->outputFooter();
    }
    
    /**
     * Action for user log in.<br>
     * If user is already log in redirect to index of this controller.
     * If user want to sign in will be fired proper method.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_login() {
        
        if ($this->isLoggedIn()) {
            //User already logged in. Redirect to index.
            header('Location: ' . APPLICATION_URL_IP . $this->name . DS . 'index');
        }
        
        if (filter_input(INPUT_POST, self::KEY_LOGIN_METHOD) == self::VALUE_LOGIN_METHOD_GOOGLE) {
            //User want to log in with Google.
            $this->logInWithGoogleProvider();
        }
        
        $this->outputHeader_unlogged();
        
        require $this->dirViews . 'login.php';
        
        $this->outputFooter();
    }
    
    /**
     * Action to where redirect response from Google API when request log in with Google.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_loginWithGoogle() {
        //Check if is response from Google API with auth code.
        if (isset($_GET['code'])) {
            
            $authResonse = $this->modelGoogle->client->fetchAccessTokenWithAuthCode($_GET['code']);
            
            if ($this->modelGoogle->client->getAccessToken()) {
                
                $_SESSION[self::GOOGLE_ACCESS_TOKEN] = $authResonse['access_token'];
                $_SESSION[self::KEY_GOOGLE_USER_DATA] = $this->modelGoogle->client->verifyIdToken();
                
                header('Location: ' . APPLICATION_URL . 'user/index');
            } else {
                echo $authResonse['error_description'] . ' ' . $authResonse['error'];
            }
        } else {
            $error_uri = APPLICATION_URL_IP . 'user/login';
            header(
                'Location: ' . filter_var($error_uri, FILTER_SANITIZE_URL),
                true,
                400
            );
        }
    }
    
    /**
     * Action for user log out.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_logout() {
        
        unset($_SESSION[self::GOOGLE_ACCESS_TOKEN]);
        unset($_SESSION[self::KEY_GOOGLE_USER_DATA]);
        $this->modelGoogle->client->revokeToken();
        session_destroy();
        
        $this->outputHeader_unlogged();
        require $this->dirViews . 'logout.php';
        $this->outputFooter();
    }
   public function action_settings()
    {
        if(isset($_SESSION["test"])) {
        $formSubmitted = filter_input(INPUT_POST, 'save_settings');
        if ($formSubmitted == 1) {
            $this->model->saveSettings($_SESSION["test"]);
        }
    $userGroup = $this->model->getUserGroup($_SESSION["test"]);
        }
        $groups= $this->model->fetchGroup();

        $this->outputHeader_unlogged();
        require $this->dirViews . 'settings.php';
        $this->outputFooter();
    }

    /**
     * Method provide user to log in with Google.
     * Redirects to Google's auth URL.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    protected function logInWithGoogleProvider() {
        
        $redirectUri = filter_var(GOOGLE_API_AUTH_RESPONSE_REDIRECT, FILTER_SANITIZE_URL);
        $this->modelGoogle->client->setRedirectUri($redirectUri);
        $auth_url = $this->modelGoogle->client->createAuthUrl(GOOGLE_API_SCOPES);
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    }
    
    /**
     * Saves needed Google user data in $_SESSION.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    protected function storeUserInSession(array $userData) {
        
        $_SESSION[self::KEY_GOOGLE_USER_DATA] = $userData;
    }
}
