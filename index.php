<?php
        session_start();
        if(isset($_SESSION['zalogowany']))
        {
            require_once 'header_zalogowany.php';
          //  exit();
        }
        else require_once 'header.php';
        
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online</title>

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
        </br></br>
        <section>
            <div class = "container">
                <div class="row">
                            <div class="tytul">
                                <h1>Jak to działa?</h1> 
                            </div>
                            
                            <div class="col-sm-3">
                                <figure>
                                    <img class="i1" src="zdjecia/images2.jpg" alt="ankieta">
                                    <figcaption>Stwórz ankietę</figcaption> 
                                </figure>
                            </div>
                       
                            <div class="col-sm-3">
                                <figure>
                                    <img class="i1" src="zdjecia/mail.png" alt="udostepnianie">
                                    <figcaption>Zaproś osoby do wypełnienia ankiety</figcaption>
                               </figure>
                            </div>
                            
                            <div class="col-sm-3">
                                <figure>
                                    <img class="i1" src="zdjecia/wykres.png" alt="wykres">
                                    <figcaption>Sprawdzaj wyniki</figcaption>
                                </figure>
                            </div>
              
                    
                    <div class="tytul">
                        <h1>Zalety ankietyzacji online</h1> 
                    </div>

                        <div class="col-sm-3">
                            <figure>
                                <img class="i1" src="zdjecia/plant.jpg" alt="środowisko"> 
                                <figcaption>Przyjazna dla środowiska w porównaniu z papierową formą</figcaption>
                            </figure>
                        </div>

                        <div class="col-sm-3">
                            <figure>
                                <img class="i1" src="zdjecia/swinka.jpg" alt="skarbonka">
                                <figcaption>Całkowicie darmowa</figcaption>    
                            </figure>
                        </div>

                        <div class="col-sm-3">
                            <figure>
                                <img class="i1" src="zdjecia/zegar.png" alt="zegar">
                                <figcaption>Dzięki prostej obsłudze oszczędzamy dużo czasu</figcaption> 
                            </figure>
                        </div>  
                    <br><br>
                        <div class="tytul">
                            <h1>Przykładowe ankiety</h1>
                        </div>
                

                    <div class="col-sm-1">
                        <figure class="s2">
                            <a href="przykladowe_ankiety.php"><img class="i2" src="zdjecia/unnamed.jpg" alt="ankieta"></a>                
                    
                            <ul>
                                <li class="listaAnkiet"><a class="link1" href="ankiety_klient.php"><i class="demo-icon icon-basket"></i>Klient</a></li>
                                <li class="listaAnkiet"><a class="link1" href="ankiety_pracownik.php"><i class="demo-icon icon-user"></i>Pracownik</a></li>
                                <li class="listaAnkiet"><a class="link1" href="ankiety_biznes.php"><i class="demo-icon icon-laptop-1"></i>Biznes</a></li>
                                <li class="listaAnkiet"><a class="link1" href="ankiety_edukacja.php"><i class="demo-icon icon-book"></i>Edukacja</a></li>
                                <li class="listaAnkiet"><a class="link1" href="ankiety_inne.php"><i class="demo-icon icon-search"></i>Inne</a></li>
                            </ul>
                        </figure>
                    </div>
                    <br><br>
                    <div class="tytul">
                        <h1>Dołącz do nas</h1> 
                    </div>
                    <br>
                    <div class="col-sm-12" id="rejestracja">
                        <figure>                 
                            <a href="Rejestracja.php"><img class="i3" src="zdjecia/register1.jpg" alt="rejestracja"></a>
                        </figure>
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

