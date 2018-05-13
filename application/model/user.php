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
    
    /**
     * Gets user by field value e.g. Google e-mail.
     * 
     * @param string $field Field name for which get user (column name).
     * @param type $value Value to search for in field.
     * @return stdClass|false User object from DB or FALSE on failure.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function getUserByField(string $field, $value) {
        
        $connection = $this->getConnection();
        $query = 'SELECT * FROM `' . DB_NAME . "`.`users_g` WHERE `$field` = '$value'";
        $statement = $connection->query($query);
        
        return $statement->fetchObject();
    }
    
    /**
     * Updates user info. If user exist in DB updates him else saves new user.
     * 
     * @param Google_Service_Plus_Person $googlePlusUser Google user object.
     * @return int|bool User ID or FALSE on failure.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function updateUser(Google_Service_Plus_Person $googlePlusUser) {
        
        $userData = [
            'g_email' => $googlePlusUser->emails[0]->value,
        ];
        
        if (!$this->getUserByField('g_email', $userData['g_email'])) {
            //Prepare all data to save.
            $userData += [
                'g_id' => $googlePlusUser->id,
                'g_first_name' => $googlePlusUser->name->givenName,
                'g_last_name' => $googlePlusUser->name->familyName,
                'g_created' => date(DateTime::ATOM),
                'g_modified' => date(DateTime::ATOM),
            ];
            //Save new user.
            return $this->saveUser($userData);
        } else {
            //Prepare data to update.
            $userData += [
                'g_id' => $googlePlusUser->id,
                'g_first_name' => $googlePlusUser->name->givenName,
                'g_last_name' => $googlePlusUser->name->familyName,
                'g_modified' => date(DateTime::ATOM),
            ];
            //Update user data.
            return $this->updateUserData($userData);
        }
    }
    
    /**
     * Updates user in database.
     * 
     * @param array $userData User data to save.
     * @return int|bool Updated user ID or FALSE on failure.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    private function updateUserData(array $userData) {
        
        $connection = $this->getConnection();
        
        $query = "UPDATE `" . DB_NAME . "`.`users_g` " . " SET ";
        //Add all values to update to query.
        foreach ($userData as $columnName => $value) {
            $query .= "$columnName='$value', ";
        }
        //Remove necessary colon at the and.
        $query = substr_replace($query, '', -2, 1);
        $query .= "WHERE g_email ='" . $userData['g_email'] . "';";
        
        $statement = $connection->query($query);
        
        if ($statement && $statement->rowCount() > 0) {
            //Get updated user ID.
            $user = $this->getUserByField('g_email', $userData['g_email']);
            return $user->id;
        }
        
        //There were some errors.
        return false;
    }

    /**
     * Saves user into DB.
     * 
     * @param array $userData User data to save.
     * @return int|bool Saved user ID or FALSE on failure.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    private function saveUser(array $userData) {
        
        $connection = $this->getConnection();
        
        $query = "INSERT INTO `" . DB_NAME . "`.`users_g` " . 
            "(g_id, g_email, g_first_name, g_last_name, g_created, g_modified) " . 
            "VALUES (" .
            "'" . $userData['g_id'] . "', " .
            "'" . $userData['g_email'] . "', " .
            "'" . $userData['g_first_name'] . "', " .
            "'" . $userData['g_last_name'] . "', " .
            "'" . $userData['g_created'] . "', " .
            "'" . $userData['g_modified'] . "'" .
            ")";
        
        return $connection->query($query) ? $connection->lastInsertId() : false;
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
