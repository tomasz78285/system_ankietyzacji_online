<?php 
    
    session_start();
    if(isset($_SESSION['zalogowany']))
    {
        require_once 'header_zalogowany.php';
        //exit();
    }
    else require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - ankiety</title>

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
        <br><br>
        <main>
            <section class="rodzaj_ankiet">
                <div class = "container">

                    <h1>Przykładowe ankiety</h1>

                    <div class="row">

                        <div class="col-sm-4" id="s4">
                            <h1><a href="ankiety_klient.php">Klient</a></h1>
                            <?php
                                    require_once('connect.php'); 
                                    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                                    if ($polaczenie -> connect_errno) {
                                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                        exit();
                                      }
                                    
                                    $sql = "SELECT nazwa_ankiety FROM ankiety WHERE grupa_badawcza='Klient'";
                                    $result = $polaczenie->query($sql);
                                    
                                    if($result && $result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo $row["nazwa_ankiety"]. "<br>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $polaczenie->close();
                                ?>
                        </div>

                        <div class="col-sm-4" id="s5">
                            <h1><a href="ankiety_pracownik.php">Pracownik</a></h1>
                            <?php
                                    require_once('connect.php'); 
                                    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                                    if ($polaczenie -> connect_errno) {
                                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                        exit();
                                      }
                                    
                                    $sql = "SELECT nazwa_ankiety FROM ankiety WHERE grupa_badawcza='Pracownik'";
                                    $result = $polaczenie->query($sql);
                                    
                                    if($result && $result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo $row["nazwa_ankiety"]. "<br>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $polaczenie->close();
                                ?>
                        </div>
            
                        <div class="col-sm-4" id="s4">
                            <h1><a href="ankiety_biznes.php">Biznes</a></h1>
                            <?php
                                    require_once('connect.php'); 
                                    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                                    if ($polaczenie -> connect_errno) {
                                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                        exit();
                                      }
                                    
                                    $sql = "SELECT nazwa_ankiety FROM ankiety WHERE grupa_badawcza='Biznes'";
                                    $result = $polaczenie->query($sql);
                                    
                                    if($result && $result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo $row["nazwa_ankiety"]. "<br>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $polaczenie->close();
                                ?>
                        </div>

                        <div class="col-sm-4" id="s5">
                            <h1><a href="ankiety_edukacja.php">Edukacja</a></h1>
                            <?php
                                    require_once('connect.php'); 
                                    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                                    if ($polaczenie -> connect_errno) {
                                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                        exit();
                                      }
                                    
                                    $sql = "SELECT nazwa_ankiety FROM ankiety WHERE grupa_badawcza='Edukacja'";
                                    $result = $polaczenie->query($sql);
                                    
                                    if($result && $result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo $row["nazwa_ankiety"]. "<br>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $polaczenie->close();
                                ?>
                        </div>
            
                        <div class="col-sm-4" id="scenter">
                            <h1><a href="ankiety_inne.php">Inne</a></h1>
                            <a href="wypelnij_ankiete.php">
                                <?php
                                        require_once('connect.php'); 
                                        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                                        if ($polaczenie -> connect_errno) {
                                            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                            exit();
                                        }
                                        
                                        $sql = "SELECT nazwa_ankiety FROM ankiety WHERE grupa_badawcza='Inne'";
                                        $result = $polaczenie->query($sql);
                                        
                                        if($result && $result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["nazwa_ankiety"]. "<br>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        
                                        $polaczenie->close();
                                ?>
                            </a>
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