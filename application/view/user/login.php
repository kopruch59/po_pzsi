<h3>Logowanie</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form name="loginWithGoogle" action="" method="POST">
                <input
                    type="hidden"
                    name="<?= UserController::KEY_LOGIN_METHOD ?>"
                    value="<?= UserController::VALUE_LOGIN_METHOD_GOOGLE ?>"
                />
                <input type="submit" class="btn btn-default" value="Zaloguj przez Google" />
            </form>
        </div>
    </div>
</div>
