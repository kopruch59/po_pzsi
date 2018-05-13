<?php

class HomeModel extends Model {

    /**
     * @deprecated since version 0.7 Using login with Google.
     */
    public function checkLogin() {
        try {
            $connection = $this->getConnection();
            if (empty($_POST["login"]) || empty($_POST["pass"])) {
                
            } else {
                $query = 'SELECT * FROM `' . DB_NAME . '`.`users` WHERE login = :login AND pass = :pass';
                $statement = $connection->prepare($query);
                $statement->execute(
                        array(
                            'login' => $_POST["login"],
                            'pass' => $_POST["pass"]
                        )
                );
                $count = $statement->rowCount();
                if ($count > 0) {
                    $_SESSION['zalogowany'] = true;

                    $row = $statement->fetch();
                    $_SESSION["group"] = $row['group_number'];
                    $_SESSION["test"] = $row['login'];
                    header("Location: " . APPLICATION_URL . "/schedule/show");
                } else {
                    $_POST['errors'] = '<label>Podane wartości są niepoprawne!</label>';
                }
            }
        } catch (PDOException $e) {
            $message = $e->getMessage();
        }
    }
    
    /**
     * @deprecated since version 0.7 Using login with Google.
     * 
     * @editor theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function logout() {
        
        session_unset();
        header("Location: " . APPLICATION_URL . "/home/login");
    }

}
