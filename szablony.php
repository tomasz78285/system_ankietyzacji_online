<?php 
    require_once 'header_zalogowany.php';
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - szablony</title>

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

                            <div class="col-sm-1" id="s13">
                                
                                <div id="title">
                                    <h1>SZABLONY</h1>
                                </div>

                                <ul>
                                    <li><a href="metryczka.php">Metryczka</a></li>
                                    <li><a href="szablon_klient.php">Ankieta dla klienta</a></li>
                                    <li><a href="szablon_pracownik.php">Ankieta dla pracownika</a></li>
                                    <li><a href="szablon_biznes.php">Ankieta na temat badania rynku</a></li>
                                    <li><a href="szablon_edukacja.php">Ankieta badająca zadowolenie uczniów z zajęć</a></li>
                                </ul>
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