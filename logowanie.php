<?php
    session_start();
    if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']==true))
    {
        header('Location: profil_user.php');
        exit();
    }
    require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - Logowanie</title>

        <meta name="description" content="Strona do ankietyzacji online">
        <meta name="keywords" content="system, ankietyzacji, online">
        <meta name="author" content="Tomasz Kadłubowski">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <script src="js/script.js" asyns></script>
	
    </head>
    <body>
        <main>
            <section>
                <div class = "container">
                    <div class="row">
                    <div class="tytul">
                        <h1>Logowanie</h1>
                    </div>
                        <div class ="col-sm-1" id="s8">
                        <form action="zaloguj.php" method="post">
                            <label>Login: </label><br>
                            <input type="text" name="login" /><br>
                            <label>Hasło: </label><br>
                            <input type="password" name="haslo" /><br><br>
                            <input type="submit" value="Zaloguj">
                            <br><br><br><br>
                            Nie masz konta? <a class="link1" href="rejestracja.php">Zarejestruj się!</a>
                        </form>
                        <?php
                            if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
                        ?>
                        </div>    
                    </div>
                </div>
            </section>
            
            <?php 
                require_once 'footer.php';
            ?>
        </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>     
    </body>
</html>