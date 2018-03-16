<h1>Logowanie:</h1>
<form action="" method="post">
    Login: <input type="text" name="login"/><br/><br/>
    Hasło: <input type="password" name="pass"/><br/><br/>
    <input type="submit" value="Zaloguj się!"/>
</form>
<?php
if (isset($message)) {
    echo '<label class="text-danger">' . $message . '</label>';
}
?>  


