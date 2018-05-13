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
     * Additional initialize Google model.
     * 
     * @param bool $loadModel TRUE if load default model for this controller, FALSE if not load model.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function __construct(bool $loadModel = true) {
        parent::__construct($loadModel);
        
        $this->modelGoogle = Model::loadModel('Google');
        
        session_name(UserModel::SESSION_NAME);
        session_id(UserModel::SESSION_ID_GOOGLE);
        session_start();
        
        empty($_SESSION[self::GOOGLE_ACCESS_TOKEN]) ?: $this->modelGoogle->client->setAccessToken($_SESSION[self::GOOGLE_ACCESS_TOKEN]);
    }
    
    /**
     * Action for user profile homepage.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_index() {
        
        UserModel::isLoggedIn() ?: header('Location: ' . APPLICATION_URL . $this->name . DS . 'login');
        
        $userData = $this->getUserData();
        
        $this->outputHeader_logged();
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
        
        if (UserModel::isLoggedIn()) {
            //User already logged in. Redirect to index.
            header('Location: ' . APPLICATION_URL . $this->name . DS . 'index');
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
//                $_SESSION[self::KEY_GOOGLE_USER_DATA] = $this->modelGoogle->client->verifyIdToken();
                
                $userId = $this->model->updateUser($this->modelGoogle->plusService->people->get('me'));
                
                $this->storeUserInSession((array)$this->model->getUserByField(UserModel::FIELD_ID, $userId));
                
                header('Location: ' . APPLICATION_URL . 'user/index');
            } else {
                echo $authResonse['error_description'] . ' ' . $authResonse['error'];
            }
        } else {
            $error_uri = APPLICATION_URL . 'user/login';
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
        
        $this->modelGoogle->client->revokeToken();
        session_unset();
        
        $this->outputHeader_unlogged();
        require $this->dirViews . 'logout.php';
        $this->outputFooter();
    }
    
    /**
     * @editor theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_settings() {
        
        UserModel::isLoggedIn() ?: header('Location: ' . APPLICATION_URL . $this->name . DS . 'login');
        
        $formSubmitted = filter_input(INPUT_POST, 'save_settings');
        
        if ($formSubmitted == 1) {
            $this->model->saveSettings($_SESSION[self::KEY_GOOGLE_USER_DATA]['id']);
        }
        
        $user = $this->model->getUserByField('id', $_SESSION[self::KEY_GOOGLE_USER_DATA]['id']);
        $userGroup = $user->group_number;
        $groups = $this->model->fetchGroup();

        $this->outputHeader_logged();
        require $this->dirViews . 'settings.php';
        $this->outputFooter();
    }

    /**
     * Returns currently logged in user data.
     * 
     * @return array User data received from Google or empty array if no data stored.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public static function getUserData() {
        
        $userData = [];
        
        if (isset($_SESSION[UserController::KEY_GOOGLE_USER_DATA])) {
            $userData = (array)$_SESSION[UserController::KEY_GOOGLE_USER_DATA];
        }
        
        return $userData;
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
