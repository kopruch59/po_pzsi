<?php
/**
 * Model class for user.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class UserModel extends Model {
    
    /**
     * @var string Name of field with creation date.
     */
    const FIELD_CREATED = 'created';
    /**
     * @var string Name of field e-mail.
     */
    const FIELD_G_EMAIL = 'g_email';
    /**
     * @var string Name of field first name.
     */
    const FIELD_G_FIRST_NAME = 'g_first_name';
    /**
     * @var string Name of field with Google ID.
     */
    const FIELD_G_ID = 'g_id';
    /**
     * @var string Name of field last name.
     */
    const FIELD_G_LAST_NAME = 'g_last_name';
    /**
     * @var string Name of field with group number.
     */
    const FIELD_GROUP_NUMBER = 'group_number';
    /**
     * @var string Name of field ID.
     */
    const FIELD_ID = 'id';
    /**
     * @var string Name of field with last modified date.
     */
    const FIELD_MODIFIED = 'modified';
    
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
            self::FIELD_G_EMAIL => $googlePlusUser->emails[0]->value,
        ];
        
        if (!$this->getUserByField(self::FIELD_G_EMAIL, $userData[self::FIELD_G_EMAIL])) {
            //Prepare all data to save.
            $userData += [
                self::FIELD_G_ID => $googlePlusUser->id,
                self::FIELD_G_FIRST_NAME => $googlePlusUser->name->givenName,
                self::FIELD_G_LAST_NAME => $googlePlusUser->name->familyName,
                self::FIELD_CREATED => date(DateTime::ATOM),
                self::FIELD_MODIFIED => date(DateTime::ATOM),
            ];
            //Save new user.
            return $this->saveUser($userData);
        } else {
            //Prepare data to update.
            $userData += [
                self::FIELD_G_ID => $googlePlusUser->id,
                self::FIELD_G_FIRST_NAME => $googlePlusUser->name->givenName,
                self::FIELD_G_LAST_NAME => $googlePlusUser->name->familyName,
                self::FIELD_MODIFIED => date(DateTime::ATOM),
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
            $query .= "`$columnName` = '$value', ";
        }
        //Remove necessary colon at the and.
        $query = substr_replace($query, '', -2, 1);
        $query .= "WHERE `" . self::FIELD_G_EMAIL . "` ='" . $userData[self::FIELD_G_EMAIL] . "';";
        
        $statement = $connection->query($query);
        
        if ($statement && $statement->rowCount() > 0) {
            //Get updated user ID.
            $user = $this->getUserByField(self::FIELD_G_EMAIL, $userData[self::FIELD_G_EMAIL]);
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
            "(g_id, g_email, g_first_name, g_last_name, created, modified) " . 
            "VALUES (" .
            "'" . $userData[self::FIELD_G_ID] . "', " .
            "'" . $userData[self::FIELD_G_EMAIL] . "', " .
            "'" . $userData[self::FIELD_G_FIRST_NAME] . "', " .
            "'" . $userData[self::FIELD_G_LAST_NAME] . "', " .
            "'" . $userData[self::FIELD_CREATED] . "', " .
            "'" . $userData[self::FIELD_MODIFIED] . "'" .
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
    
    public function saveSettings($userId) {
        
        $group = filter_input(INPUT_POST, 'group');
        
        $connection = $connection = $this->getConnection();
        $query = "UPDATE `" . DB_NAME . "`.`users_g` SET `group_number` = '$group' WHERE `id` = '$userId'";
        $connection->query($query);
    }
}
