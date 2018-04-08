<div class="container col-md-6 col-offset-3" align="center">
    <h3>Logowanie</h3>
    <!--<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" role="form">
                    <div class="form-group">
    
                        <label for="exampleInputEmail1">
                            Login
                        </label>
                        <input type="text" name="login"/><br/><br/>
                    </div>
                    <div class="form-group">
    
                        <label for="exampleInputPassword1">
                            Password
                        </label>
                        <input type="password" name="pass"/><br/><br/>
                    </div>
                    <div class="form-group">
    
                        <label for="exampleInputFile">
    
                        </label>
    
                        <button type="submit" class="btn btn-primary">
                            Zaloguj
                        </button>
                </form>
            </div>
        </div>
    </div>-->


    <form class="form-signin " method="POST" >
        <img  id="login-img" class="mb-4" src="https://login.gov/assets/img/login-gov-600x314.png" alt="">
        <label for="exampleInputEmail1" class="sr-only">Email address</label>
        <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="exampleInputPassword1" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button></br>
    </form>
</div>

<?php
if (!empty($_POST['errors'])) {
    echo '<label class="text-danger">' . $_POST['errors'] . '</label>';
}
?>  


