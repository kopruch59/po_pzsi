<h3>Logowanie</h3>
<div class="container-fluid">
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
</div>

<?php
if (!empty($_POST['errors'])) {
    echo '<label class="text-danger">' . $_POST['errors'] . '</label>';
}
?>  


