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
  
    <?php
        require_once('connect.php');  
          
        if(isset($_POST['nazwa_ankiety']) &&  isset($_POST['P1'])  && isset($_POST['P101'])) 
        {
          
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

            $nazwa_ankiety = $_POST['nazwa_ankiety'];
            $gr_badawcza = $_POST['grupa_badawcza'];
            $autor = $_SESSION['user'];

            $polaczenie->query("INSERT INTO ankiety(nazwa_ankiety, grupa_badawcza, autor) VALUES ('$nazwa_ankiety','$gr_badawcza','$autor')");
                                            
    
                                      


            $P1 = $_POST["P1"];
            $P2 = $_POST["P2"];
            $P3 = $_POST["P3"];
            $P4 = $_POST["P4"];
            $P5 = $_POST["P5"];
            $P6 = $_POST["P6"];
            $P7 = $_POST["P7"];
            $P8 = $_POST["P8"];
            $P9 = $_POST["P9"];
            $P10 = $_POST["P10"];

            $polaczenie->query("INSERT INTO pytania (tresc_pytania, nr_pytania_w_ankiecie, rodzaj ,ankieta) VALUES 
                                                                                ('$P1','1','zamkniete','$nazwa_ankiety'),
                                                                                ('$P2','2','multi','$nazwa_ankiety'),
                                                                                ('$P3','3','otwarte','$nazwa_ankiety'),
                                                                                ('$P4','4','zamkniete','$nazwa_ankiety'),
                                                                                ('$P5','5','multi','$nazwa_ankiety'),
                                                                                ('$P6','6','otwarte','$nazwa_ankiety'),
                                                                                ('$P7','7','zamkniete','$nazwa_ankiety'),
                                                                                ('$P8','8','multi','$nazwa_ankiety'),
                                                                                ('$P9','9','zamkniete','$nazwa_ankiety'),
                                                                                ('$P10','10','otwarte','$nazwa_ankiety')");

            $P101 = $_POST['P101'];
            $P102 = $_POST['P102'];
            $P201 = $_POST['P201'];
            $P202 = $_POST['P202'];
            $P203 = $_POST['P203'];
            $P204 = $_POST['P204'];
            $P205 = $_POST['P205'];
            $P401 = $_POST['P401'];
            $P402 = $_POST['P402'];
            $P501 = $_POST['P501'];
            $P502 = $_POST['P502'];
            $P701 = $_POST['P701'];
            $P702 = $_POST['P702'];
            $P703 = $_POST['P703'];
            $P704 = $_POST['P704'];
            $P801 = $_POST['P801'];
            $P802 = $_POST['P802'];
            $P901 = $_POST['P901'];
            $P902 = $_POST['P902'];
            $P903 = $_POST['P903'];
            $P904 = $_POST['P904'];

            

             $polaczenie->query("INSERT INTO odpowiedzi (tresc_odpowiedzi, pytanie) VALUES 
                                                                                    ('$P101','$P1'),
                                                                                    ('$P102','$P1'),
                                                                                    ('$P201','$P2'),
                                                                                    ('$P202','$P2'),
                                                                                    ('$P203','$P2'),
                                                                                    ('$P204','$P2'),
                                                                                    ('$P205','$P2'),
                                                                                    ('$P401','$P4'),
                                                                                    ('$P402','$P4'),
                                                                                    ('$P501','$P5'),
                                                                                    ('$P502','$P5'),
                                                                                    ('$P701','$P7'),
                                                                                    ('$P702','$P7'),
                                                                                    ('$P703','$P7'),
                                                                                    ('$P704','$P7'),
                                                                                    ('$P801','$P8'),
                                                                                    ('$P802','$P8'),
                                                                                    ('$P901','$P9'),
                                                                                    ('$P902','$P9'),
                                                                                    ('$P903','$P9'),
                                                                                    ('$P904','$P10')");


       

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
                        
                    <div id="scenter">
                        <div class="row">
                                    <div class="col-sm-1">Pytanie1<br>
                                            <input type="text" name="P1"><br><br>
                                            <label>Odpowiedzi:</label>
                                            <input type="text" name="P101"><br>
                                            <input type="text" name="P102"><br>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">Pytanie2<br>
                                    <input type="text" name="P2" ><br><br>
                                    <label>Odpowiedzi:</label>
                                    <input type="text" name="P201"><br>
                                    <input type="text" name="P202"><br>
                                    <input type="text" name="P203"><br>
                                    <input type="text" name="P204"><br>
                                    <input type="text" name="P205"><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">Pytanie3<br>
                                    <input type="text" name="P3"><br><br>
                                    <label>Odpowiedzi:</label>
                                    <input type="text" disabled><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">Pytanie4<br>
                                    <input type="text" name="P4" ><br><br>
                                    <label>Odpowiedzi:</label>
                                    <input type="text" name="P401"><br>
                                    <input type="text" name="P402"><br>      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">Pytanie5<br>
                                        <input type="text" name="P5"><br><br>
                                        <label>Odpowiedzi:</label>
                                        <input type="text" name="P501"><br>
                                        <input type="text" name="P502"><br>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">Pytanie6<br>
                                <input type="text" name="P6" ><br><br>
                                <label>Odpowiedzi:</label>
                                <input type="text" disabled ><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">Pytanie7<br>
                                <input type="text" name="P7"><br><br>
                                <label>Odpowiedzi:</label>
                                <input type="text" name="P701"><br>
                                <input type="text" name="P702"><br>
                                <input type="text" name="P703"><br>
                                <input type="text" name="P703"><br>
                                <input type="text" name="P704"><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">Pytanie8<br>
                                <input type="text" name="P8" ><br><br>
                                <label>Odpowiedzi:</label>
                                <input type="text" name="P801"><br>
                                <input type="text" name="P802"><br>      
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">Pytanie9<br>
                                <input type="text" name="P9"><br><br>
                                <label>Odpowiedzi:</label>
                                <input type="text" name="P901"><br>
                                <input type="text" name="P902"><br>
                                <input type="text" name="P903"><br>
                                <input type="text" name="P903"><br>
                                <input type="text" name="P904"><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">Pytanie10<br>
                                <input type="text" name="P10" ><br><br>
                                <label>Odpowiedzi:</label>
                                <input type="text" disabled><br> 
                            </div>
                        </div>
                        <input type="submit" value="Stwórz ankietę" />
                    </div>
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