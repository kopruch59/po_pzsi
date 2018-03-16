<?php

session_start();

class HomeModel extends Model {

    //Checking inserted login&pass with login&pass in database
    public function checkLogin() {
        try {
            $connection = $this->getConnection();
            if (isset($_POST["login"])) {
                if (empty($_POST["login"]) || empty($_POST["pass"])) {
                    $message = '<label>Wszystkie pola są wymagane!</label>';
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
                        $row = $statement->fetch();
                        $_SESSION["group"] = $row['group_number'];
                        header("Location: " . APPLICATION_URL . "/schedule/show");
                    } else {
                        $message = '<label>Podane wartości są niepoprawne!</label>';
                    }
                }
            }
        } catch (PDOException $e) {
            // report error message
            $message = $e->getMessage();
        }
    }

}

