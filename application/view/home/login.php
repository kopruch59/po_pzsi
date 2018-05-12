<div class="container col-md-6 col-offset-3" align="center" style="margin-top: 70px;"> 
    <form class="form-signin " method="POST" >
        <img  id="login-img" class="mb-4" src="../public/pictures/loginBanner.png" alt="">
        <div id="error_message">
            <?php
            if (!empty($_POST['errors']))
                echo '<label class="text-danger">' . $_POST['errors'] . '</label>';
            ?>
        </div>
        <label for="exampleInputEmail1" class="sr-only">Login</label>
        <input type="text" name="login" id="inputLogin" class="form-control modifySelect" placeholder="Login" required autofocus>
        <label for="exampleInputPassword1" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control modifySelect" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block sign-in-button" type="submit">Zaloguj się</button></br>
    </form>
</div>




