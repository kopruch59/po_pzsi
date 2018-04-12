<h1>User profile homepage</h1>
<?php
if (isset($_SESSION[UserController::KEY_GOOGLE_USER_DATA])) {
    $googleUserProfile = $_SESSION[self::KEY_GOOGLE_USER_DATA];
    echo 'Witaj ' .$googleUserProfile['name'];
} else {
    echo 'Niezalogowany';
}
