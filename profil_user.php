<?php
    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: logowanie.php');
        require_once 'header.php';
        exit();
    }
    else require_once 'header_zalogowany.php';
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - Mój profil</title>

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
                            <div class="col-sm-5" id="s9">
                                Moje konto
                            </div>
                            <div class=col-sm-5 id="n2">
                                    <ul>
                                        <li class="l2"><a href="profil_user.php">Profil</a></li>
                                        <li class="l2"><a href="moje_ankiety.php">Moje ankiety</a></li>
                                        <li class="l2"><a href="stworz_ankiete.php">Nowa ankieta</a></li>
                                        <li class="l2"><a href="statystyki.php">Statystyki</a></li>
                                        <li class="l2"><a href="ustawienia_konta.php">Ustawienia konta</a></li>  
                                        <li class="l2"><a href="wyloguj.php">Wyloguj</a></li>       
                                    </ul>
                            </div>
                            <div class="col-sm-5" id="s10">
                                Kontent <br>
                                <?php
                                    echo "<p>Witaj ".$_SESSION['user']." (nie jesteś ".$_SESSION['user'].'? <a href="wyloguj.php">Wyloguj się</a>)<br><br>W tej zakładce masz możliwość zmian ustawień konta. Masz tu również podgląd na wyniki swoich ankiet.</p>';
                                ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php 
                require_once 'footer.php';
            ?>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>     
    </body>
</html>