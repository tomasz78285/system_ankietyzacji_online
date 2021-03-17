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

        <title>Metryczka</title>

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
  
    <?php
        require_once('connect.php');  
          
        if(isset($_POST['nazwa_ankiety']) &&  isset($_POST['P1'])  && isset($_POST['P101'])) 
        {
          
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

            $nazwa_ankiety = $_POST['nazwa_ankiety'];
            $gr_badawcza = $_POST['grupa_badawcza'];
            $autor = $_SESSION['user'];

            $polaczenie->query("INSERT INTO ankiety(nazwa_ankiety, gr_badawcza, autor) VALUES ('$nazwa_ankiety','$gr_badawcza','$autor')");
                                            
    
                                      


            $P1 = $_POST["P1"];
            $P2 = $_POST["P2"];
            $P3 = $_POST["P3"];
            $P4 = $_POST["P4"];

           
            $polaczenie->query("INSERT INTO pytania (tresc_pytania, nr_pytania_w_ankiecie, rodzaj ,ankieta) VALUES 
                                                                                ('$P1','1','zamkniete','$nazwa_ankiety'),
                                                                                ('$P2','2','zamkniete','$nazwa_ankiety'),
                                                                                ('$P3','3','zamkniete','$nazwa_ankiety'),
                                                                                ('$P4','4','zamkniete','$nazwa_ankiety')");

            $P101 = $_POST['P101'];
            $P102 = $_POST['P102'];
            $P201 = $_POST['P201'];
            $P202 = $_POST['P202'];
            $P203 = $_POST['P203'];
            $P204 = $_POST['P204'];
            $P205 = $_POST['P205'];
            $P301 = $_POST['P301'];
            $P302 = $_POST['P302'];
            $P303 = $_POST['P303'];
            $P304 = $_POST['P304'];
            $P401 = $_POST['P401'];
            $P402 = $_POST['P402'];

             $polaczenie->query("INSERT INTO odpowiedzi (tresc_odpowiedzi, pytanie) VALUES 
                                                                                    ('$P101','$P1'),
                                                                                    ('$P102','$P1'),
                                                                                    ('$P201','$P2'),
                                                                                    ('$P202','$P2'),
                                                                                    ('$P203','$P2'),
                                                                                    ('$P204','$P2'),
                                                                                    ('$P205','$P2'),
                                                                                    ('$P301','$P3'),
                                                                                    ('$P302','$P3'),
                                                                                    ('$P303','$P3'),
                                                                                    ('$P304','$P3'),
                                                                                    ('$P401','$P4'),
                                                                                    ('$P402','$P4')");


       

            if ($polaczenie -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
            }
        }

        ?>


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
                        
                    
                    <div class="row">
                                <div class="col-sm-1">Pytanie1<br>
                                        <input type="text" name="P1" value="Płeć"><br><br>
                                        <input type="text" value="Mężczyzna" name="P101"><br>
                                        <input type="text" value="Kobieta" name="P102"><br>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">Pytanie2<br>
                                <input type="text" name="P2" value="Wiek"><br><br>
                                <input type="text" value="Poniżej 18" name="P201"><br>
                                <input type="text" value="18 - 24" name="P202"><br>
                                <input type="text" value="25 - 50" name="P203"><br>
                                <input type="text" value="51 - 60" name="P204"><br>
                                <input type="text" value="Powyżej 60" name="P205"><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">Pytanie3<br>
                                <input type="text" name="P3" value="Wyksztalcenie"><br><br>
                                <input type="text" value="Podstawowe" name="P301"><br>
                                <input type="text" value="Gimnazjalne" name="P302"><br>
                                <input type="text" value="Średnie" name="P303"><br>
                                <input type="text" value="Wyższe" name="P303"><br>
                                <input type="text" value="Brak" name="P304"><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">Pytanie4<br>
                                <input type="text" name="P4" value="Zamieszkanie"><br><br>
                                <input type="text" value="Wieś" name="P401"><br>
                                <input type="text" value="Miasto" name="P402"><br>
                                        
                            </div>
                        </div>
               
                    <div id="formularz"></div>
                        
                            <div class="pole">
                            <input class="wariant" type="button" value="PYTANIE OTWARTE" onclick="dodajOtwarte()"><br>
                            <input class="wariant" type="button" value="PYTANIE ZAMKNIĘTE" onclick="dodajZamkniete()"><br>
                            <input class="wariant" type="button" value="MULTICHOICE" onclick="dodajZamkniete2()"><br><br>
                            <input class="wariant" type="submit" value="Stwórz ankietę">
                        </form>
                      
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
