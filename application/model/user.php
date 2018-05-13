<?php
/**
 * Model class for user.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */

class UserModel extends Model {
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
