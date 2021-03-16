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
        <script src="js/script.js" asyns></script>
	
    </head>
    <body>
        <main>
            <form id="formKreator">
                <section id = quest>
                    <div class="kreatorTytul">
                        <br><br>
                        <h1>Kreator ankiet</h1>                        
                    </div>
                    <form method="post">
                        <div class="pole">
                            <label>Tytuł ankiety</label>
                            <input class="s8" type="text" name="nazwa_ankiety"><br>
                            <label>Grupa badawcza</label>
                            <input type="text" value="Klient" name="grupa_badawcza" disabled></input>
                        </div>
                    

                    <div id="formularz"></div>
                        
                            <div class="pole">
                                <div class="row">
                            

                            
                                <div class="col-sm-1">Pytanie1<br>
                                        <label>Czy jesteś zadowolony z zakupu ostatniego produktu?</label><br>
                                        <input type="text" name="P1O1" value="Tak"><br>
                                        <input type="text" name="P1O1" value="Nie"><br>                                  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1">Pytanie2<br>
                                        <label>Czy w poleciłbyś ten produkt swoim znajomym?</label><br>
                                        <input type="text" value="Tak" name="P2O1"><br>
                                        <input type="text" value="Nie" name="P2O2"><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1">Pytanie3<br>
                                        <label>Co poprawiłbyś w zakupionym produkcie?</label><br>
                                        <input type="text" name="P3O1" disabled><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1">Pytanie4<br>
                                        <label>Czy cena produktu jest adekwatna do jego jakości?</label><br>
                                        <input type="text" value="Tak" name="P4O1"><br>
                                        <input type="text" value="Nie" name="P4O2"><br>
                                        
                                    </div>
                                </div>

                                <br>
                            <input class="wariant" type="button" value="PYTANIE OTWARTE" onclick="dodajOtwarte()"><br>
                            <input class="wariant" type="button" value="PYTANIE ZAMKNIĘTE" onclick="dodajZamkniete()"><br>
                            <input class="wariant" type="button" value="MULTICHOICE" onclick="dodajZamkniete2()"><br><br>
                            <input class="wariant" type="submit" value="Stwórz ankietę">
                        </form>
                                <?php
                                     require_once('connect.php');  
                                     if(isset($_POST['nazwa_ankiety'])) {
                                        try
                                        {
                                        $polaczenie = new PDO('mysql:host=' . $host . ';dbname=' . $db_name, $db_user, $db_password);
                                        }      
                                    
                                    
                                        catch(PDOException $e)
                                        {
                                            echo $e->getMessage();
                                            die();
                                        }

                                        
                                        $nazwa_ankiety = $_POST['nazwa_ankiety'];
                                        $gr_badawcza = $_POST['grupa_badawcza'];
                                        $autor = $_SESSION['user'];

                                        $sh = $polaczenie->prepare('
                                            INSERT INTO ankiety (nazwa_ankiety, gr_badawcza, autor) VALUES (:nazwa_ankiety, :gr_badawcza, :autor)
                                        ');

                                    
                                        // $P101 = $_POST['P101'];
                                        // $P102 = $_POST['P102'];
                                        // $P201 = $_POST['P201'];
                                        // $P202 = $_POST['P202'];
                                        // $P203 = $_POST['P203'];
                                        // $P204 = $_POST['P204'];
                                        // $P205 = $_POST['P205'];
                                        // $P301 = $_POST['P301'];
                                        // $P302 = $_POST['P302'];
                                        // $P303 = $_POST['P303'];
                                        // $P304 = $_POST['P304'];
                                        // $P401 = $_POST['P401'];
                                        // $P402 = $_POST['P402'];
                            
                                
                                        $sh->bindValue(':nazwa_ankiety', $nazwa_ankiety, PDO::PARAM_STR);
                                        $sh->bindValue(':gr_badawcza',$gr_badawcza, PDO::PARAM_STR);
                                        $sh->bindValue(':autor',$autor, PDO::PARAM_STR);
                                
                                    
                                        $sh->execute();
                                        echo "Gotowe";
                                     }
                                ?>

                        <br>
                           
                            <input class="wariant" type="submit" value="Stwórz ankietę">
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