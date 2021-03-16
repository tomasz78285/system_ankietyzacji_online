<?php 
    session_start();
    require_once 'header_zalogowany.php';
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - Moje ankiety</title>

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
                        <div class="col-sm-1" id="scenter">
                           <figure>
                                <figcaption>Moje ankiety</figcaption>
                                
                           </figure>
                           <?php
                                    require_once('connect.php'); 
                                    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                                    if ($polaczenie -> connect_errno) {
                                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                        exit();
                                      }
                                    
                                    $user = $_SESSION['user'];
                                    $sql = "SELECT nazwa_ankiety FROM ankiety WHERE autor='$user'";
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