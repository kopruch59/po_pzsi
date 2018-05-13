<?php
/**
 * Model class for user.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */

class UserModel extends Model {
    
    /**
     * @var string Key name for Google access token element.
     */
    const GOOGLE_ACCESS_TOKEN = 'accessToken';
    
    /**
     * @var string Session ID when user is login by Google.
     */
    const SESSION_ID_GOOGLE = 'loginWithGoogle';
    
    /**
     * @var string Session name when user is log in.
     */
    const SESSION_NAME = 'sessionName';
    
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
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getUser($email) {
        $connection = $this->getConnection();
        $query = 'SELECT * FROM `' . DB_NAME . "`.`users_g` WHERE g_email = '$email'";
        $statement = $connection->query($query);
        $count = $statement->rowCount();
        
        return $count > 0 ? true : false;
    }
    
    public function updateUser(Google_Service_Plus_Person $userData) {
        
        $userInfo = [
            'g_id' => $userData->id,
            'g_email' => $userData->emails[0]->value,
            'g_first_name' => $userData->name->givenName,
            'g_last_name' => $userData->name->familyName,
            'g_created' => date(DateTime::ATOM),
            'g_modified' => date(DateTime::ISO8601),
        ];
        
        if (!$this->getUser($userInfo['g_email'])) {
            $this->saveUser($userInfo);
        }
    }
    
    private function saveUser(array $userInfo) {
        $connection = $this->getConnection();
        $query = "INSERT INTO `" . DB_NAME . "`.`users_g` " . 
                "(g_id, g_email, g_first_name, g_last_name, g_created, g_modified) " . 
                "VALUES (" .
                "'" . $userInfo['g_id'] . "', " .
                "'" . $userInfo['g_email'] . "', " .
                "'" . $userInfo['g_first_name'] . "', " .
                "'" . $userInfo['g_last_name'] . "', " .
                "'" . $userInfo['g_created'] . "', " .
                "'" . $userInfo['g_modified'] . "'" .
                ")";
        try {
            $result = $connection->query($query);
            $errors = $connection->errorInfo();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
        public function fetchGroup() {
        $connection = $this->getConnection();
        $instruction = "SELECT name FROM `" . DB_NAME . "`.groups";
        $query = $connection->query($instruction);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        }
        /**
     * @param string|int $user User for which get group.
     * @return type User group.
     */
    public function getUserGroup($user) {
        $connection = $connection = $this->getConnection();
        $query = 'SELECT group_number FROM `' . DB_NAME . '`.`users` WHERE login = :login';
        $statement = $connection->prepare($query);
        $group = $statement->execute(
            [
                'login' => $user,
            ]
        );
        
        return $group;
    }
    public function saveSettings($user) {
        
        $group = filter_input(INPUT_POST, 'group');
        
        $connection = $connection = $this->getConnection();
        $query = "UPDATE `" . DB_NAME . "`.`users` SET `group_number` = '$group' WHERE `login` = '$user'";
        $connection->query($query);
    }
}
