<?php 
    session_start();
    require_once 'connect.php';  
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

        <title>Kreator ankiet</title>

        <meta name="description" content="Strona do ankietyzacji online">
        <meta name="keywords" content="system, ankietyzacji, online">
        <meta name="author" content="Tomasz Kadłubowski">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <script src="script.js" asyns></script>
	
    </head>
    <body>
        <main>
           <!-- <form id="formKreator"> -->
                <section id = quest>
                    <div class="kreatorTytul">
                        <br><br>
                        <h1>Kreator ankiet</h1>                        
                    </div>
                    <form method="post">
                        <div class="pole">
                            <label>Tytuł ankiety</label>
                            <input class="s8" type="text" name="nazwa_ankiety"><br>
                            <label>Wybierz grupę badawczą</label>
                            <select name="grupa_badawcza">
                                <option>Klient</option>
                                <option>Pracownik</option>
                                <option>Biznes</option>
                                <option>Edukacja</option>
                                <option>Inne</option>
                            </select>                
                        </div>
                  <!--  </form> -->

                 

                    <div id="formularz"></div>
                    <div class="pytania">
                        <br><br>
                        <input class="wariant" type="button" value="PYTANIE OTWARTE" onclick="dodajOtwarte()"><br>
                        <input class="wariant" type="button" value="PYTANIE ZAMKNIĘTE" onclick="dodajZamkniete()"><br>
                        <input class="wariant" type="button" value="MULTICHOICE" onclick="dodajZamkniete2()"><br><br>
                        <input class="wariant" type="submit" value="Stwórz ankietę">
                    </div>
                </section>
                </form>
                
                      <?php
                            require_once('connect.php');  
                            if(isset($_POST['nazwa_ankiety'])) 
                            {
                                $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

                                $nazwa_ankiety = $_POST['nazwa_ankiety'];
                                $gr_badawcza = $_POST['grupa_badawcza'];
                                $autor = $_SESSION['user'];

                                $polaczenie->query("INSERT INTO ankiety(nazwa_ankiety, grupa_badawcza, autor) VALUES ('$nazwa_ankiety','$gr_badawcza','$autor')");
                                header('Location: udostepnianie.php');

                                $pytanieOtawrte = $_POST['pytanie_otwarte'];
                                $pytanieZamkniete = $_POST['pytanie_zamkniete'];
                                $pytanieMulti = $_POST['multichoice'];
                                $polaczenie->query("INSERT INTO pytania (tresc_pytania, ankieta) VALUES 
                                                                                                ('$pytanieOtawrte','$nazwa_ankiety'),
                                                                                                ('$pytanieZamkniete','$nazwa_ankiety'),
                                                                                                ('$pytanieMulti','$nazwa_ankiety')");

                                $odpOtwarta = $_POST['odp_otwarta'];
                                $odpZamknieta = $_POST['odp_zamkniete'];
                                $odpMulti = $_POST['odp_multi'];
                                
                                $polaczenie->query("INSERT INTO odpowiedzi (tresc_odpowiedzi, pytanie) VALUES 
                                                                                                ('$odpOtwarta','$pytanieOtawrte'),
                                                                                                ('$odpZamknieta','$pytanieZamkniete'),
                                                                                                ('$odpMulti','$pytanieMulti')");

                                if ($polaczenie -> connect_errno) {
                                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                    exit();
                                }
                                }
                                ?>
            <br><br><br><br>
<?php 
    require_once 'footer.php';
?>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
