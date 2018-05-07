<div class="container col-md-6 col-offset-3" align="center">
    <h3>Logowanie</h3>   
    <form class="form-signin " method="POST" >
        <img  id="login-img" class="mb-4" src="https://login.gov/assets/img/login-gov-600x314.png" alt="">
        <div id="error_message">
            <?php
            if (isset($_SESSION['blad']))
                echo $_SESSION['blad'];
            if (!empty($_POST['errors']))
                echo '<label class="text-danger">' . $_POST['errors'] . '</label>';
            ?>
        </div>
        <label for="exampleInputEmail1" class="sr-only">Email address</label>
        <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Login" required autofocus>
        <label for="exampleInputPassword1" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block sign-in-button" type="submit">Sign in</button></br>
    </form>
</div>




