<?php
    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: logowanie.php');
        exit();
    }
    require_once 'header_zalogowany.php';
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - Stwórz ankietę</title>

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
                            <h1>Kreator ankiet</h1>
                        </div>
                        
                        <div class="col-sm-4" id="s6">
                            <figure>
                                <a class="link1" href="szablony.php">
                                    <i class="demo-icon icon-doc-text"></i>
                                </a>
                                <figcaption class="podtytul">Użyj gotowego szablonu</figcaption>
                            </figure>               
                        </div>

                        <div class="col-sm-4" id="s7">
                            <figure>
                                <a class="link1" href="kreator.php">
                                    <i class="demo-icon icon-plus-circle"></i>
                                </a>
                                <figcaption class="podtytul">Stwórz własną ankietę</figcaption>
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