<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Student schedule</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="../public/css/style.css" type="text/css" />
    </head>
    <body class="text-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../home/index">
            <img src="https://t4.ftcdn.net/jpg/01/09/28/51/240_F_109285174_dYigK3bMKNbnMVg3qDLDCu4qUhwYPc3s.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Kalendarz studencki
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarNav">
                <div class="navbar-nav mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../schedule/show">Kalendarz <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../schedule/add">Dodaj zajęcia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="popover" title="Informacje o koncie" data-content=" 
                                <?php 
                                    echo 'Login: '.$_SESSION["test"].
                                         ' Grupa: '.$_SESSION["group"];
                                ?>">Konto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../home/logout">Wyloguj się</a>
                        </li>
                    </ul>
            </div>
        </nav>